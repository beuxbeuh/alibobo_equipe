<form action="index.php?page=articleEdit" method="post">
    <div>
        <label for="designation">Designation :</label>
        <input type="text" id="designation" name="designation" value="<?= $article['designation'] ?>" />
    </div>
    <div>
        <label for="description">Description :</label>
        <input type="text" id="description" name="description" value="<?= $article['description'] ?>" />
    </div>
    <div>
        <label for="puht">Prix Unitaire Hors Taxe :</label>
        <input type="text" id="puht" name="puht" value="<?= $article['puht'] ?>€" />
    </div>
    <div>
        <label for="reference">Reference :</label>
        <input type="text" id="reference" name="reference" value="<?= $article['reference'] ?>"/>
    </div>
    <div>
        <label for="qtestock">Quantité en stock :</label>
        <input type="number" id="qtestock" name="qtestock" value="<?= $article['qtestock'] ?>" />
    </div>
    <div>
        <label for="qtestockesecu">Quantité stock de séccurité :</label>
        <input type="number" id="qtestockesecu" name="qtestockesecu" value="<?= $article['qtestockesecu'] ?>" />
    </div>
    <div>
        <label for="masse">Masse :</label>
        <input type="number" id="masse" name="masse" value="<?= $article['masse'] ?>" />
    </div>
    <div>
        <label for="id_categorie">Catégorie :</label>
	<select name="id_categorie" id="id_categorie">
	    <option value=""><?= $article['id_categorie'] ?></option>
	    <option value="">----Please choose the category on this article----</option>
	    <option value=""></option>
	    <option value=""></option>
	    <option value=""></option>
	</select>
    </div>
    <div>
	<label for="id_tva">TVA :</label>
	<select name="id_tva" id="id_tva">
	     <option value=""><?= $article['id_tva'] ?></option>
	     <option value="">----Please choose the TVA on this article!!----</option>
	     <option value=""></option>
	     <option value=""></option>
	     <option value=""></option>
	</select>
    </div>
    <div>
        <input type="checkbox" name="cgu" id="cgu" value="1"<?=isset($_POST['cgu'])?"checked":'';?> /><label for="cgu" >J'accepte les <a href="index.php?page=cgu" target="_blank">Conditions Générales d'Utilisation</a></label>
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Envoyer" />
    </div>
    <input type="hidden" name="frmEdit" />
</form>
