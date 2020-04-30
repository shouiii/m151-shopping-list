<?php

namespace AppBundle\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class itemController extends Controller
{
    public function listAction(Request $request)
    {
        $mysql = $this.connectToDB();
        $sql = "SELECT * FROM imj_items";
        $items = [];
        $result = $mysql->query($sql);

        $row = $result->fetch_all();

        return $this->render("list.html.php", ["items" => $row]);
    }

    public function addAction(Request $request)
    {
        $itemCount = $request->get("amount");
        $itemname = $request->get("name");

        $mysqli = $this->connectToDB();

        $statement = $mysqli->prepare("INSERT INTO imj_items(amounts, name) VALUES(?, ?)");
        $statement->bind_param("is", $itemCount, $itemName);
        $statement->execute();

        return $this->redirect("list");
    }

    public function removeAction(Request $request, $id)
    {
        $idToDelete = intval($request->get("id"));
        $mysqli = $this->connectToDB();
        $statement = $mysqli->prepare("DELETE FROM imj_items WHERE id = ?");
        $statement -> bind_param("i", $idToDelete);
        $statement->execute();

        return $this->redirect("list");
    }

    public function editAction(Request $request)
    {
        $idToEdit = intval($request->get("id"));
        $mysqli = $this->connectToDB();
        $sql = "SELECT * FROM imj_items WHERE id = " . intval($idToEdit)
        $result = $mysqli->query($sql);

        $item = $result->fetch_array(MYSQLI_ASSOC);
        return $this->render("List.html.php", [])
    }

    public function connectToDB()
    {
        $dbhost = "login-67.hoststar.ch";
        $dbusername = "inf17d";
        $dbpassword = "j5TQh!zmMtqsjY3";
        $database = "inf17d";
        $connection = new \mysqli($dbhost, $dbusername, $dbpassword, $database) or die("Connect failed: %s\n" . $connection->error);

        return $connection;
    }
}
