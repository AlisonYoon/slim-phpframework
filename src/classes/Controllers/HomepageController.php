<?php


namespace Example\Controllers;

use Example\Models\StudentModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;


class HomepageController
{
    public $renderer;

    /**
     * HomepageController constructor.
     * @param $renderer
     */
    public function __construct(PhpRenderer $renderer, StudentModel $studentModel)  //second argument here is the model. The model now is the dependency of the controller.
    {
        $this->renderer = $renderer;
        $this->studentModel = $studentModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        //do things such as validation, authentication and getting data from the model

//        $viewData = ['students'=> ['Matt', 'Tom', 'Liz']];

//        $viewData = $this->studentModel->getStudents();  //now that there's model, use that instead of the array above.

        $viewData = ['students' => $this->studentModel->getStudent()]; // now this way, there's a variable called $students

//        $this->renderer->render($response, 'index.phtml', ['name'=>'mike']); //third argument is an optional param which takes an associative array. This case, it creates variable $name with 'mike' as a value

//        $this->renderer->render($response, 'index.phtml', $viewData);

//        return $response->withJson($viewData); //return result in JSON format. Also, it removes the dependency on PhpRenderer.

//        return $response->withRedirect('/login.php'); // if the user needs to log in, send her to here.

        return $response->withStatus(403); //403 means you don't have permission.
    }
}