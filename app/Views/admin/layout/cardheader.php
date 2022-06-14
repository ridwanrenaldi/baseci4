                            
                            <div class="card-header">
                                <h3 class="card-title"><?= isset($cardheader['title']) ? $cardheader['title'] : '' ?></h3>

                                <?php if(isset($cardheader['name']) && isset($cardheader['url'])){ ?>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a href="<?= $cardheader['url'] ?>">
                                                <button type="button" class="btn bg-gradient-warning btn-sm"><i class="fa fa-plus-square"></i> <?= $cardheader['name'] ?></button>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
