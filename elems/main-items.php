    <section class="items">
        <form class="select" method="POST">Показать по: 
            <select name="show" id="select">
                <option value="3" 
                    <?php
                        if(isset($showItems) && $showItems == 3){
                            echo 'selected';
                        }
                    ?>
                >3</option>
                <option value="6"
                    <?php
                        if(isset($showItems) && $showItems == 6){
                            echo 'selected';
                        }
                    ?>
                >6</option>
            </select>
        </form>
        <div class="container">
           <div class="items-flex">
                <?php
                    foreach($data as $item):
                ?>
                <a href="<?=$item['url']?>" class="item">
                    <div class="item-photo">
                        <img src="<?= $item['img'] ?>" alt="img">
                    </div>
                    <div class="item-category">
                        <?= $item['category'] ?>
                    </div>
                    <div class="item-date">
                        <?= $item['date'] ?>
                    </div>
                    <div class="item-title">
                        <?= $item['title'] ?>
                    </div>
                    <div class="item-subtitle">
                        <?= $item['subtitle'] ?>
                    </div>
                </a>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </section>