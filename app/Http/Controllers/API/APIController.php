<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class APIController
 *
 * @package App\Http\Controllers\API
 *
 * @SWG\Swagger(
 *     basePath="/api",
 *     host="127.0.0.1:8000",
 *     schemes={"http","https"},
 *     @SWG\SecurityScheme(
 *         securityDefinition="Bearer",
 *         type="apiKey",
 *         name="Authorization",
 *         in="header"
 *     ),
 *     @SWG\Info(
 *         version="1.0",
 *         title="Blog API",
 *         description="Blog API",
 *         @SWG\Contact(
 *             name="Ahmed Ali Gad",
 *             url="https://www.linkedin.com/in/ahmed-gad-60141a122/"),
 *         @SWG\License(
 *             name="Developed by Ahmed",
 *             url="https://www.linkedin.com/in/ahmed-gad-60141a122/"
 *         )
 *     ),
 * )
 */
class APIController extends Controller
{
    //
}
