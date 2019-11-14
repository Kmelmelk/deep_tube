<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;


    class PropertiesController
    {
        /**
         * @Route("/Singles", name="properties.index")
         * @return Response
         */

        public function index():Response
        {
            return new Response('Les singles');
        }

}

