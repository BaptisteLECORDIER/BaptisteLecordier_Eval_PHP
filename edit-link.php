<?php include_once('./inc/head.php')?>
  <body>
  <?php include_once('./inc/header.php')?>
    <main>
      <div class="container h-100">
        <div class="row justify-content-center h-50">
          <div class="col-md-6 shadow p-3 pt-5">
            <h2 class="mb-3"><?php if(isset($_GET['id'])) {echo 'Éditer le lien #'.$_GET['id'];}?></h2>
            <div class="mb-3">
              <form action="./controllers/edit_links_controller.php?id=1" method="get">
                <div class="mb-3">
                  <div class="form-floating">
                    <input class="d-none" type="id" value="<?php echo $_GET['id']?>" name="id">
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
                <div class="mb-3">
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
                  <button class="btn btn-primary btn-lg">Enregister</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php include_once('./inc/footer.php')?>