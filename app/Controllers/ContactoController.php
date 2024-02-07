<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    use App\Models\Contacto;
    use App\Controllers\BaseController;

    class ContactoController extends BaseController{

        public function IndexAction() {
            $procesaForm = false;

            $contacto = Contacto::getInstancia();

            if (isset($_GET['provincia'])) {
                $procesaForm = true;
                $data["contacto"] = $contacto->getContactosByProvincia($_GET['provincia']);
                
            } else $data["contacto"] = $contacto->getAll();
            
            $data["profile"] = $_SESSION["profile"];

            $this->renderHTML("../views/index_view.php", $data);
        }

        public function setAction() {
            $data["profile"] = $_SESSION["profile"];

            if (!isset($_POST["creacion"])) {
                $this->renderHTML("../views/add_view.php", $data);
            } else {

                $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
                $tlf = filter_var($_POST["tlf"], FILTER_SANITIZE_STRING);
                $correo = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
                $prov = filter_var($_POST["prov"], FILTER_SANITIZE_STRING);

                $contacto = Contacto::getInstancia();

                $contacto->setNombre($nombre);
                $contacto->setTelefono($tlf);
                $contacto->setEmail($correo);
                $contacto->setProv($prov);
                $contacto->set();

                header("Location: http://contactos.eval/");

            }
        }

        public function editAction($request) {
            $data["profile"] = $_SESSION["profile"];

            $parts = explode("/", $request);
            $id = $parts[2];
            
            $contacto = Contacto::getInstancia();
            
            $datosContacto = $contacto->get($id);
            
            if ($datosContacto) {
                $procesaForm = false;
                
                $data["nombre"] = $datosContacto["nombre"];
                $data["telefono"] = $datosContacto["telefono"];
                $data["email"] = $datosContacto["email"];
                $data["provincia"] = $datosContacto["provincia"];
                
                if (isset($_POST["edicion"])) {
                    $procesaForm = true;
                    
                    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
                    $tlf = filter_var($_POST["tlf"], FILTER_SANITIZE_STRING);
                    $correo = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
                    $prov = filter_var($_POST["prov"], FILTER_SANITIZE_STRING);
                    
                    
                    $data["nombre"] = $nombre;
                    $data["telefono"] = $tlf;
                    $data["correo"] = $correo;
                    $data["provincia"] = $prov;

                    //VALIDACIÓN FORMULARIO EN SERVIDOR

                    if (empty($nombre)) {
                        $procesaForm = false;                            
                    }

                    if ($procesaForm) {
                        $contacto->setNombre($nombre);
                        $contacto->setTelefono($tlf);
                        $contacto->setEmail($correo);
                        $contacto->setProv($prov);
                        $contacto->edit();

                        header("Location: http://contactos.eval/");
                        exit;
                    }

                } else {
                    $this->renderHTML("../views/edit_view.php", $data);
                }

            } else {
                $this->renderHTML("../views/edit_error_contacto_view.php", $data);
            }
        
        
        }

        public function deleteAction($request) {
            $data["profile"] = $_SESSION["profile"];

            $parts = explode("/", $request);
            $id = $parts[2];
            
            $contacto = Contacto::getInstancia();
            
            $contacto->delete($id);

            header("Location: http://contactos.eval/");
            exit;
            
            // if ($datosContacto) {
            //     $procesaForm = false;
                
            //     $data["nombre"] = $datosContacto["nombre"];
            //     $data["telefono"] = $datosContacto["telefono"];
            //     $data["email"] = $datosContacto["email"];
                
            //     if (isset($_POST["edicion"])) {
            //         $procesaForm = true;
                    
            //         $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
            //         $tlf = filter_var($_POST["tlf"], FILTER_SANITIZE_STRING);
            //         $correo = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
                    
                    
            //         $data["nombre"] = $nombre;
            //         $data["telefono"] = $tlf;
            //         $data["correo"] = $correo;

            //         //VALIDACIÓN FORMULARIO EN SERVIDOR

            //         if (empty($nombre)) {
            //             $procesaForm = false;                            
            //         }

            //         if ($procesaForm) {
            //             $contacto->setNombre($nombre);
            //             $contacto->setTelefono($tlf);
            //             $contacto->setEmail($correo);
            //             $contacto->edit();

            //             header("Location: http://contactos.eval/");
            //             exit;
            //         }
                    
            //     } else {
            //         $this->renderHTML("../views/edit_view.php", $data);
            //     }

            // } else {
            //     $this->renderHTML("../views/edit_error_contacto_view.php", $data);
            // }
        
        
        }

        public function deleteConfAction($request) {
            $data["profile"] = $_SESSION["profile"];

            $parts = explode("/", $request);
            $id = $parts[2];
            
            $contacto = Contacto::getInstancia();

            $datosContacto = $contacto->get($id);
            
            if ($datosContacto) {
                $data["nombre"] = $datosContacto["nombre"];
                $data["telefono"] = $datosContacto["telefono"];
                $data["email"] = $datosContacto["email"];
                $data["provincia"] = $datosContacto["provincia"];
                
                if (isset($_POST["borrado"])) {
                    
                    $contacto->delete($id);

                    header("Location: http://contactos.eval/");
                    exit;
                    
                } else {
                    $this->renderHTML("../views/delete_conf_view.php", $data);
                }

            } else {
                $this->renderHTML("../views/edit_error_contacto_view.php", $data);
            }        
        
        }

        // public function getProvinciaAction($request) {

        //     $procesaForm = false;

        //     if (isset($_GET["busca"])) {
        //         $query = '%' . $_GET['busqueda'] . '%' ?? 5;
        //         $procesaForm = true;
        //     }

        //     $contacto = Contacto::getInstancia();

        //     $parts = explode("/", $request);
        //     $provincia = $parts[2];

        //     $data["contacto"] = $contacto->getContactosByProvincia($provincia);
        //     $data["profile"] = $_SESSION["profile"];

        //     $this->renderHTML("../views/index_view.php", $data);
        // }

    }



?>