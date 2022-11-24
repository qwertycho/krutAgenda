<?php
class Item {
    private function prioriteit($prio){
        switch ($prio) {
            case 1:
                    echo "<option value='1'>Laag</option>";
                    echo "<option value='2'>Gemiddeld</option>";
                    echo "<option value='3'>Hoog</option>";
                break;
            case 2:
                    echo "<option value='2'>Gemiddeld</option>";
                    echo "<option value='1'>Laag</option>";
                    echo "<option value='3'>Hoog</option>";
                break;
            case 3:
                    echo "<option value='3'>Hoog</option>";
                    echo "<option value='1'>Laag</option>";
                    echo "<option value='2'>Gemiddeld</option>";
                break;
            default:
                    echo "<option value='1'>Laag</option>";
                    echo "<option value='2'>Gemiddeld</option>";
                    echo "<option value='3'>Hoog</option>";
                break;
        }
    }

    private function status($status){
        switch ($status) {
            case "a":
                echo "
                <option value='a'>Open</option>
                <option value='b'>In behandeling</option>
                <option value='n'>Afgerond</option>";
                break;
            case "b":
                echo "
                <option value='b'>In behandeling</option>
                <option value='a'>Open</option>
                <option value='n'>Afgerond</option>";
                break;
            case "n":
                echo "
                <option value='n'>Afgerond</option>
                <option value='a'>Open</option>
                <option value='b'>In behandeling</option>";
                break;
            default:
                echo "
                <option value='a'>Open</option>
                <option value='b'>In behandeling</option>
                <option value='n'>Afgerond</option>";
                break;
        }
    }


    private function buildItem($array) {
        echo "<div class='item' id='item-".$array['ID']."'>";
        echo "<div class='itemContainer'>";
        echo "<h3 contentEditable='true' class='itemTitel'>".$array['onderwerp']."</h3>";

        echo "<p contentEditable='true' class='itemText'>".$array['inhoud']."</p>";

        echo "<div class='dataContainer'>";
        echo "<label>Begindatum:</label><input type='date' name='itemBD' value='".$array['beginDatum']."' class='itemBD' autocomplete='off' data-date-format='DD MMMM YYYY'>";
        echo "</div>";

        echo "<div class='dataContainer'>";
        echo "<label>Einddatum:</label><input type='date' name='itemED' value='".$array['eindDatum']."' class='itemED' autocomplete='off' data-date-format='DD MMMM YYYY'>";
        echo "</div>";

        echo "<div class='dataContainer'>";
        echo "<label>prioriteit</label><select name='prioriteit' class='prio' autocomplete='off' onchange='updateItem(".$array['ID'].")'>";
        $this->prioriteit($array['prioriteit']);
        echo "</select>";
        echo "</div>";

        echo "<div class='dataContainer'>";
        echo "<label>status</label><select name='status' class='status' autocomplete='off' onchange='postUpdate(".$array['ID'].")'>";
        $this->status(htmlspecialchars($array['status']));
        echo "</select>";
        echo "</div>";

        echo "<button class='deleteButton' onclick='deleteItem(".$array['ID'].")'>Delete</button>";
        echo "<button class='deleteButton' onclick='updateItem(".$array['ID'].")'>Update</button>";
        echo "</div>";
        echo "</div>";
    }

    public function showPosts($array, $user){
        foreach ($array as $post) {
            $this->buildItem($post, $user);
    }
    }
    
}