 <!-- Contacts -->
<form action="<?php echo  ma_get_full_url('view/ajax/risposta.php')?>" method="post" id="modulo" class="sky-form">
    <fieldset>                  
        <div class="row">
            <section class="col col-6">
                <label class="label"><?php echo  CL_NOME?> e <?php echo  CL_COGNOME?></label>
                <label class="input">
                    <i class="icon-append fa fa-user"></i>
                    <input type="text" name="<?php echo  TABLE_ANAGRAFICARICHIESTE?>_Firstname" id="firstname">
                </label>
            </section>
            <section class="col col-6">
                <label class="label"><?php echo  CL_EMAIL?></label>
                <label class="input">
                    <i class="icon-append fa fa-envelope-o"></i>
                    <input type="email" name="<?php echo  TABLE_ANAGRAFICARICHIESTE?>_Email" id="email">
                </label>
            </section>
        </div>
        <section>
            <label class="label"><?php echo  CL_NOTE?></label>
            <label class="textarea">
                <textarea rows="4" name="<?php echo  TABLE_ANAGRAFICARICHIESTE?>_Note" id="note"></textarea>
            </label>
        </section>
         <section>
            <label class="checkbox"><input type="checkbox" name="privacy" id="privacy"><i></i><a href="<?php echo  articoli::ma_getPermalink('privacy')?>" target="_new"><?php echo    MSG_PRIVICY?></a></label>
        </section>
    </fieldset>
    
    <footer>
        <button type="submit" class="button btn-u"><?php echo  CL_INVIA?></button>
    </footer>
    <div class="message">
        <i class="rounded-x fa fa-check"></i>
        <p><?php echo  MSG_GRAZIE_CONTATTO?></p>
    </div>
</form>         





