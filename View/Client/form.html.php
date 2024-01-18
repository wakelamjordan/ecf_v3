<form action="">
    <div>
        <label for="id">Id</label>
        <input type="text" name="id" id="id">
    </div>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
    </div>
    <div>
        <button type="submit"<?=$modifier?> >Modifier</button>
        <button type="submit" <?=$creer?> >Créer</button>
    </div>
</form>