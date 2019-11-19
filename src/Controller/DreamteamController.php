<?php


namespace App\Controller; //app = src; donc SRC / Controller

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DreamteamController extends AbstractController
{
    /**
     * @Route("/atif", name="atif")
     */
    public function atifZourgani()
    {
        // var_dump('Atif Zourgani il est fort comme un Homme');
        //die;
        // Par default le code est 200 pour dire 'OK' et le contenue c'est du 'HTML.'
        $response = new Response('Hello World');
        return $response;
        // ou return new response.... (favoriser la variable quand même)
    }

    /**
     * On crée l'annotation pour le chemin
     * @Route("/user", name="user") //On l'appel user pour avoir l'indentité du user
     */
    public function idUser(){  //On commence un méthode.

        $nom = "Stark"; //On crée une variable avec le nom.
        $prenom = "Tony"; //Puis une autre avec le prénom.

        //On crée un variable réponse, avec dedans la création d'une NOUVELLE réponse, dans laquelle on écrit le
        //contenue de notre réponse dans une balise HTML.

        $reponse =new Response("<div style='margin: 0;padding: 0; height:100vh; display: flex; justify-content: center; align-items: center; background-color: royalblue; color: white; font-size: 80px'> i am" . " " . "<span style='color: #AA3333; font-size: 80px'> " . $prenom . "</span>" . " " . "<span style='color: yellow; font-size: 80px'>" . $nom . "</span></div>");


        // Appel de la méthode CreatFromGlobal de la classe Request. On recupère toutes les données dans une seule classe.
        $request = Request::createFromGlobals();


        //On retourne cette réponse via un return, et on fait appel à la variable.
        return $reponse;
    }






    /**
     * @Route("/products", name="products") //On crée une nouvelle route.
     */
    public function produits(){
        //On crée une méthode produits.

        $request = Request::createFromGlobals();
        //On crée une request (une méthode static, ça évite de devoir faire "new" à chaque fois)

        //dump($request->query->get("id"));
        // Pour débuger !!

        $reponse = new Response($request->query->get("id"));
        //crée un nouvelle reponse dans laquelle on met la requette pour recup l'info que l'on souhaite.

        return $reponse;
        // On affiche cette réponse.
    }









    /**
     * @Route("/poker", name="poker") //On crée une nouvelle route.
     */
    public function utilisateur(Request $request){//On peut directement mettre ici notre requette.
        //On crée une méthode pour l'utilisateur.

       // $request = Request::createFromGlobals();
        //On crée une request (une méthode static, ça évite de devoir faire "new" à chaque fois) en début pour pouvoir l'avoir dans les variables.

        //On crée des variables avec les requetes pour les nom/prenom/age de l'utilisateur.
        $nom = ($request->query->get('nom'));
        $prenom = ($request->query->get('prenom'));
        $age = ($request->query->get('age'));

        //dump($request->query->get("id"));
        // Pour débuger !!

        $reponse = new Response($nom . " " . $prenom . " " . $age);
        //On crée une réponse pour recup nos variables.

        $tryagain = new Response('age mini incorrect');
        //On crée une nouvelle reponse si jamais l'age n'est pas correct.

        //On crée ensuite une boucle pour imposer notre condition.
        if ($age >= 18){

            return $reponse;
            //On affiche la réponse si age supérieur à 18ans.

        } return $tryagain;
            //On affiche la réponse négative.
    }

    /**
     * @Route("/product/{id}", name="product")
     */
    public function ProductShow($id)
    {
        var_dump($id);
    }


    /**
     * @Route("/test/{nb}",name="test") // On crée une route avec une wildcard.
     */

    //On fait la PubF dans laquelle on note notre wildcard.
    public function PremierTest(int $nb)
    {
        //On crée une variable réponse avec une nouvelle instance de Response avec en parametre notre wildcard.
        $reponse = new Response($nb);

        //On retourne la réponse.
        return $reponse;
    }

    /**
     * @Route("/admin", name="admin_connexion")
     */
    public function Connexion()
    {
        // génère une url pour la route dont le nom est "article"
        //$url = $this->generateUrl('article');

        // effectue une redirection vers la doc de Symfony
        //return $this->redirect($url);

        // cumule les deux méthodes 'generateUrl' et 'redirect'
        return $this->redirectToRoute('user');
    }

    /**
     * @Route("/twig_article",name="twig_article")
     */
    public function twigArticle()
    {
        //dump('twig');die(); toujours tester avec un Dump.

        //on simule des données dla bdd
        $title = 'Welcome';
        $content= 'contenu de la page';
        $lien = 'lien';
        $liensidebar = 'liensidebar';
        $header = 'header';
        $main = 'main';
        $footer = 'footer';
        $img1 = 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTxbWDRp0uDnhvGkesRkA8DsHUomz2vNr07nD7AEE1_I29izRR6';
        $img2 = 'https://www.presse-citron.net/wordpress_prod/wp-content/uploads/2018/11/meilleure-banque-image.jpg';
        $test = "<h1 style='color: #718C00'>Titre test</h1>";
        $sidebar = true;
        $tags = ['tag 1','tag 2','tag 3'];


        //recupere et compile le contenue d'un fichier twig dans le dossier template en lui envoyant des variables.
        return $this->render('article.html.twig', [
            'title' => $title,
            'content' => $content,
            'lien' => $lien,
            'liensidebar' => $liensidebar,
            'header' => $header,
            'main' => $main,
            'footer' => $footer,
            'img1' => $img1,
            'img2' => $img2,
            'test' => $test,
            'sidebar' => $sidebar,
            'tags' => $tags
        ]);
    }
}



