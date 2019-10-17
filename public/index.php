<?php
require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'debug' => true,
        'displayErrorDetails' => true
    ]
]);

require '../src/container.php';
new \App\Database\Capsule;
$app->get('/', \App\controllers\pagesController::class . ':home')->setName('home');

// CRÉATION PERSO
$app->get('/creer', \App\controllers\pagesController::class. ':creer')->setName('creation');
$app->post('/creer', \App\controllers\pagesController::class. ':creerPerso');

// CRÉATION Monstres
$app->get('/creerM', \App\controllers\pagesController::class. ':creerM')->setName('monstres');
$app->post('/creerM', \App\controllers\pagesController::class. ':creerMonstre');

// VOIR TOUS LES PERSOS
$app->get('/liste', \App\controllers\pagesController::class. ':liste')->setName('liste');

// VOIR DETAIL D'UN PERSO     
$app->get('/detail/{id}', \App\controllers\pagesController::class. ':detail')->setName('detail');

// SUPPRIMER UN PERSO
$app->post('/liste', \App\controllers\pagesController::class. ':supprimer')->setName('supprimer');

// MODIFIER UN PERSO
$app->get('/modifier{id}', \App\controllers\pagesController::class. ':modifier')->setName('modifier');
$app->post('/modifier{id}', \App\controllers\pagesController::class. ':updatePerso');

$app->get('/accueil', \App\controllers\loginController::class . ':accueil')->setName('connexion');

$app->get('/login', \App\controllers\loginController::class . ':seConnecter')-> setName('login');
$app->post('/login', \App\controllers\loginController::class . ':seConnecter');

$app->get('/create/{id}', \App\controllers\loginController::class . ':voir')/*-> setName('login')*/;
$app->post('/create/{id}', \App\controllers\loginController::class . ':creerUtilisateur');

$app->get('/choisir', \App\controllers\pagesController::class . ':choisir')->setName('choix');
$app->post('/choisir', \App\controllers\pagesController::class . ':choisir');


$app->run();


/*
class DemoMiddleware {

  public function __invoke($request, $response,$next) {
    $response->write("<h1>Bienvenue</h1>");
    return $next($request, $response);

  }
*/
 ?>
