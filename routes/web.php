<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\cuotaController;
use App\Http\Controllers\historialController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\padecimientoController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\anamnesisController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DetalleCitaController;
use App\Http\Controllers\OdontologoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\planController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\especialidadController;
use App\Http\Controllers\OcupacionController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\recepcionistaController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('personas', PersonaController::class);
Route::resource('recepcionistas', recepcionistaController::class);
Route::resource('odontologos', OdontologoController::class);
Route::resource('especialidades', especialidadController::class);
Route::resource('citas', CitaController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('agendas', AgendaController::class);
Route::resource('odontogramas', OdontogramaController::class);
Route::resource('historiales', historialController::class);
Route::resource('padecimientos', padecimientoController::class);
Route::resource('anamnesis', anamnesisController::class);
Route::resource('piezas', PiezaController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('pagos', planController::class);
Route::resource('cuotas', cuotaController::class);


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index']);

    Route::resource('users', UserController::class);
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/create', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
});


Route::resource('ocupaciones', OcupacionController::class);
Route::resource('bitacoras', BitacoraController::class);
Route::get('/home', [HomeController::class, 'index']);
Route::resource('permissions', PermissionController::class);
//Route::resource('revisiones','RevisionController');
