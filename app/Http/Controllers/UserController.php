<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        auth()->login($user);

        return redirect()->route('home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {   
        if(empty($data['type'])){
            $data['type'] = config('users.autoTypeRegister');
        };

        if(empty($data['profile_picture'])){
            $data['profile_picture'] = 'default-profile.png'; // Caminho relativo a partir de public/
        };

        return User::create([
            'type' => $data['type'], 
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_picture' => $data['profile_picture'],

            'status' => config('users.autoStatusRegister'),
            'registered' => now(),
        ]);
    }

    public function autoView()
    {
        $user = Auth::user();

        return view('users.auto-view', compact('user'));
    }

    public function autoEditPassword()
    {
        $user = Auth::user();

        return view('users.auto-edit-password', compact('user'));
    }

    public function autoEdit()
    {
        $user = Auth::user();

        return view('users.auto-edit',compact('user'));
    }

    public function update(Request $request)
    {
        // Validar os dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id, // Exclui o email do usuário autenticado
            'birthday' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar imagem
        ]);
    
        // Obter o usuário logado
        $user = auth()->user();
    
        // Atualizar os dados do usuário
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->birthday = $validatedData['birthday'];
    
        // Se houver uma nova imagem de perfil
        if ($request->hasFile('profile_picture')) {
            // Apagar a imagem antiga se houver
            if ($user->profile_picture && $user->profile_picture != 'default-profile.png') {
                Storage::delete('public/' . $user->profile_picture);
            }
    
            // Salvar a nova imagem
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }
    
        // Salvar as alterações no banco de dados
        $user->save();
    
        // Retornar com uma mensagem de sucesso
        return redirect()->route('users.auto-edit')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function updatePassword(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed', // A senha nova deve ser confirmada
        ]);
    
        // Verificar se a senha atual está correta
        if (!Hash::check($validatedData['current_password'], Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'A senha atual está incorreta.']);
        }
    
        // Atualizar a senha do usuário
        $user = Auth::user();
        $user->password = Hash::make($validatedData['new_password']);
        $user->save();
    
        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('users.auto-edit-password')->with('success', 'Senha alterada com sucesso!');
    }

    public function collaboratorsDashboard()
    {
        $collaborators = User::where('type', 'collaborator')->paginate(10);
        return view('users.collaborators-dashboard', compact('collaborators'));
    }

    public function collaboratorsView($id)
    {
        $collaborator = User::where('id', $id)
        ->where('type', 'collaborator')
        ->first();

        return view('users.collaborators-view', compact('collaborator'));
    }


    public function collaboratorsfilter(Request $request)
    {
        // Iniciando a consulta para as reservas
        $query = User::query();

        // Verificando se cada campo de filtro está presente e aplicando a condição na consulta
        if ($request->filled('name')) {
            $query->where('name', $request->name);
        }

        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }

        if ($request->filled('phone')) {
            $query->where('phone', $request->phone);
        }

        $collaborators = $query->paginate(10);

        return view('users.collaborators-filter', compact('collaborators'));
    }
    

    public function customersDashboard()
    {
        $customers = User::where('type', 'customer')->paginate(10);
        return view('users.customers-dashboard', compact('customers'));
    }

    public function customersView($id)
    {
        $customer = User::where('id', $id)
        ->where('type', 'customer')
        ->first();

        return view('users.customers-view', compact('customer'));
    }



    public function customersfilter(Request $request)
    {
        // Iniciando a consulta para as reservas
        $query = User::query();

        // Verificando se cada campo de filtro está presente e aplicando a condição na consulta
        if ($request->filled('name')) {
            $query->where('name', $request->name);
        }

        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }

        if ($request->filled('phone')) {
            $query->where('phone', $request->phone);
        }

        $customers = $query->paginate(10);

        return view('users.customers-filter', compact('customers'));
    }
    
    
}
