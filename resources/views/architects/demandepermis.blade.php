<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            display: flex;
            align-items: center;
            height: 100vh;
        }

        form {
            margin: 0 auto;
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        button {
            margin-top: 10px;
            padding: 10px 15px;
            border: none;
            background: #007bff;
            color: #fff;
        }

        .upload-wrapper {
            display: flex;
            align-items: center;
        }

        .upload-wrapper label {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        #upload-list {
            margin-top: 10px;
            list-style: none;
            padding-left: 0;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    @csrf
    <form id="form" method="POST" action="{{ url('dmpermis') }}">
        <h1>DEMANDE DE PERMIS</h1>
        <div class="section" id="section1">

            <h2>Information sur la demande</h2>

            <label for="nature">Nature du projet :</label>
            <input type="text" id="nom" name="nom">

            <label for="visa">Liste des visas à cocher :</label>
            <select id="visa" name="visa">
                <option value="appartement">NONE</option>
                <option value="A">Visa 1</option>
                <option value="B">Visa 2</option>
            </select>

            <label>Ce projet est-il une opération immobilière ?</label>

            <label for="oui">
                <input type="radio" id="oui" name="immo" value="oui">
                Oui
            </label>

            <label for="non">
                <input type="radio" id="non" name="immo" value="non">
                Non
            </label>

            <label for="type_maison">Classe :</label>
            <select id="type_maison" name="type_maison">
                <option value="appartement">NONE</option>
                <option value="A">Classe A</option>
                <option value="B">Classe B</option>
                <option value="C">Classe C</option>
                <option value="D">Classe D</option>
                <option value="E">Classe E</option>
                <option value="F">Classe F</option>
                <option value="H">Classe H</option>
                <option value="I">Classe I</option>
                <option value="J">Classe J</option>
            </select> <br>

            <button type="button" id="next-1">Section suivante</button>

        </div>

        <div class="section" id="section2" style="display:none;">

            <h2>Informations sur le Demandeur</h2>

            <label for="demandeur_nom">Demandeur (Nom et Prenoms):</label>
            <input type="text" id="demandeur_nom" name="demandeur_nom" required>

            <label for="demandeur_nom">Adresse Postale: </label>
            <input type="text" id="demandeur_adresse" name="demandeur_adreseP" required>

            <label for="demandeur_nom">Adresse Electronique:</label>
            <input type="text" id="demandeur_adresse2" name="demandeur_adresseE" required>

            <label for="demandeur_nom">Telephone :</label>
            <input type="text" id="demandeur_tel" name="Tel" required>

            <label for="demandeur_nom">Type Proprietaire:</label>
            <input type="text" id="demandeur_type " name="demandeur_type" required>

            <button type="button" id="prev-2">Section précédente</button>
            <button type="button" id="next-2">Section suivante</button>

        </div>

        <div class="section" id="section3" style="display:none;">

            <h2>Informations sur le propriétaire</h2>

            <label for="autre_info"> Proprietaire(Nom ou raison sociale):</label>
            <textarea id="autre_info0" name="nomP" required></textarea>

            <label for="autre_info">Nom du gérant :</label>
            <textarea id="autre_info1" name="nomG" required></textarea>

            <label for="autre_info"> Adresse Postale:</label>
            <textarea id="autre_info2" name="AdresseG" required></textarea>

            <label for="autre_info"> Adresse Electronique:</label>
            <textarea id="autre_info3" name="AdresseE" required></textarea>

            <label for="autre_info"> Telephone:</label>
            <textarea id="autre_info4" name="telP" required></textarea>


            <button type="button" id="prev-3">Section précédente</button>
            <button type="button" id="next-3">Section suivante</button>

        </div>

        <div class="section" id="section4" style="display:none;">

            <h2>Autres Informations sur la demande</h2>

            <label for="paiement">Numero Tf :</label>
            <input type="text" id="num" name="num_tf" required>

            <label for="paiement">Section cadastrale (si disponible):</label>
            <input type="text" id="sec" name="section" required>

            <label for="paiement">Lotissement:</label>
            <input type="text" id="lotis" name="lotissement" required>

            <label for="paiement">ILot N°:</label>
            <input type="text" id="ilot" name="ilot" required>

            <label for="paiement">Lot N°:</label>
            <input type="text" id="lot" name="lot" required>

            <label for="paiement">Nombres de lots:</label>
            <input type="text" id="nombre" name="nbr_lot" required>

            <label for="paiement">Superficie du terrain (m2):</label>
            <input type="text" id="superficie" name="superficie" required>
            <label for="confirmation"></label>

            <label for="paiement">Autre Titre :</label>
            <input type="text" id="autre" name="autre" required>

            <label for="paiement">Numéro d'acte :</label>
            <input type="text" id="numero" name="num_acte" required>

            <label for="paiement">Date de l'acte :</label>
            <input type="date" id="date" name="date_acte" required>
                <div></div>
            <button type="button" id="prev-4">Section précédente</button>
            <button type="button" id="next-4">Section suivante</button>

        </div>

        <div class="section" id="section5" style="display:none;">

            <h2>Documents à fournir</h2>

            <p>
                Sélectionnez les fichiers à télécharger (formats autorisés : .pdf, .doc, .docx)
            </p>

            <div class="upload-wrapper">

                <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx">

                <label for="documents">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span>Ajouter des fichiers</span>
                </label>

            </div>

            <ul id="upload-list"></ul>

            <p class="max-size">
                Taille max. par fichier : 10 Mo
            </p>

            <button type="button" id="prev-5">Section précédente</button>
            <button type="button" onclick="submitForm()">Valider</button>
        </div>

    </form>

    <div id="confirmation" class="popup">

        <div class="popup-content">
            <span class="close" onclick="hidePopup()">&times;</span>
            <p>Êtes-vous sûr de vouloir soumettre le formulaire ?</p>
            <button onclick="submitForm()">Oui</button>
            <button onclick="hidePopup()">Annuler</button>
        </div>

    </div>

    <script>
        $("#next-1").click(function() {
            $("#section1").hide();
            $("#section2").show();
        });

        $("#prev-2").click(function() {
            $("#section2").hide();
            $("#section1").show();
        });

        $("#next-2").click(function() {
            $("#section2").hide();
            $("#section3").show();
        });

        $("#prev-3").click(function() {
            $("#section3").hide();
            $("#section2").show();
        });

        $("#next-3").click(function() {
            $("#section3").hide();
            $("#section4").show();
        });

        $("#prev-4").click(function() {
            $("#section4").hide();
            $("#section3").show();
        });

        $("#next-4").click(function() {
            $("#section4").hide();
            $("#section5").show();
        });

        $("#prev-5").click(function() {
            $("#section5").hide();
            $("#section4").show();
        });

        function submitForm() {
            document.getElementById("form").submit();
        }

        function hidePopup() {
            document.getElementById("confirmation").style.display = "none";
        }
        
    </script>

</body>

</html>
