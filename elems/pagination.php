<div>
    <nav>
        <ul class="pagination">
        <li
            <?php 
                if(isset($_GET['pagination'])&&($_GET['pagination'] == 1)){
                    echo 'class="disabled"';
                }
            ?>
        >
            <a href="?pagination=1"  aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
            <?php 
                for($i = 1; $i <= $pages; $i++){
                    if(isset($_GET['pagination'])&&($_GET['pagination'] == $i)){
                        echo "<li class=\"active\"><a href=\"?pagination=$i\">$i</a></li>";
                    }elseif((!isset($_GET['pagination'])&&($i==$pages))){
                        echo "<li class=\"active\"><a href=\"?pagination=$i\">$i</a></li>";
                    }else{
                        echo "<li><a href=\"?pagination=$i\">$i</a></li>";
                    }
                }
            ?>
        <li
            <?php
                if((isset($_GET['pagination'])&&($_GET['pagination'] == $pages) || empty($_GET['pagination']))){
                echo 'class="disabled"';
                }
            ?>
        >
            <a 
                <?php
                    echo "href=\"?pagination=$pages\"";
                ?>
            aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        </ul>
    </nav>
</div>