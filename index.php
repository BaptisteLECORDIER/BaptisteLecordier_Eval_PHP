<?php include_once('./inc/head.php')?>
  <body>
    <?php include_once('./inc/header.php')?>
    
    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="mb-3">
              <form action="./controllers/add_links_controller.php" method="get">
                <div class="row g-2">
                  <div class="col-md">
                    <div class="form-floating">
                      <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        placeholder="Stack overflow"
                      />
                      <label for="title">Titre</label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-floating">
                      <input
                        type="url"
                        class="form-control"
                        id="url"
                        name="url"
                        placeholder="https://stackoverflow.com"
                      />
                      <label for="url">Lien</label>
                    </div>
                  </div>
                  <div class="col-md-auto d-flex">
                    <button class="btn btn-primary btn-lg">Ajouter</button>
                  </div>
                </div>
              </form>
            </div>
            <ul class="list-group">

            <?php 

              $linksToInc = get_all_link ();
              foreach($linksToInc as $linkToInc) {
                echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="'.$linkToInc['url'].'"> '.$linkToInc['title'].'</a><span><a href="edit-link.php?id='.$linkToInc['link_id'].'"><i class="fa-regular fa-pen-to-square me-1 text-warning"></a></i><a href="./controllers/remove_links_controller.php" class="fa-solid fa-trash ms-1 text-danger"></a></span></li>';
              }
            ?>
              
              
            </ul>
          </div>
        </div>
      </div>
    </main>
<?php include_once('./inc/footer.php')?>
