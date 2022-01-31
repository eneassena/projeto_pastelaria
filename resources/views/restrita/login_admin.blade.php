<div class="container">
    <div class="row-col-12 justify-content-center ">
    <h1 class="h1 mt-5 text-center">Painel Administrador</h1>
    </div>
    <div class="row justify-content-center ">
        
        <div class="col-sm-6" style="margin-top: 100px;">
            
            <form action="?pag=area_restrita/acesso_admin" method="post" autocomplete='off'>

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6">
                        <label for="admLogin">Usuário</label>
                        <input type="text" class="form-control" name="adLogin" id="admLogin" placeholder="Login administrador" required />
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6">
                        <label for="adcPass">Password</label>
                        <input type="password" class="form-control" name="adPass" id="adcPass" placeholder="Senha administrador" required />
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6">
                        <input type="submit" value="Logar" class="float-right btn btn-danger">
                    </div>
                </div>
            </form>
            <?php if(isset($messagem_erro_login)): ?>
                <div class="row-col-12">
                    <div class="alert alert-danger">
                            <p class="text-center"><?php echo $messagem_erro_login; ?></p>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
     
</div>