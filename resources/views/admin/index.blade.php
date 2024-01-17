<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administration</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      position: relative;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      width: 100%;
      box-sizing: border-box;
    }

    h1, h2 {
      color: #333;
    }

    p {
      color: #555;
      margin-bottom: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin-bottom: 20px;
    }

    li {
      margin-bottom: 10px;
    }

    a {
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
    }

    button {
      background-color: #28a745;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-bottom: 20px;
    }

    button:hover {
      background-color: #218838;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 2;
    }

    .modal h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .modal label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    .modal input {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      margin-bottom: 15px;
    }

    .modal button {
      background-color: #007bff;
      color: #fff;
    }

    .modal button:hover {
      background-color: #0056b3;
    }

    /* Overlay Styles */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.3);
      z-index: 1;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenue sur l'administration</h1>
    <p>Ici, vous pouvez gérer votre site web.</p>

    <h2>Gestion des utilisateurs</h2>
    <button id="createUserBtn">Créer un utilisateur</button>

    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Permissions</th>
          <th>Password</th>
        </tr>
      </thead>
      <tbody id="userTableBody">
        <!-- Utilisateurs seront affichés ici dynamiquement -->
    </tbody>
    </table>
  </div>

  <!-- Overlay div -->
  <div class="overlay" id="overlay"></div>

  <!-- Modal pour la création d'utilisateur -->
  <div id="createUserModal" class="modal">
    <h2>Créer un utilisateur</h2>
    <form id="createUserForm">
      @csrf
      <label for="newUserName">Nom:</label>
      <input type="text" id="newUserName" name="newUserName" required>

      <label for="newUserEmail">Email:</label>
      <input type="email" id="newUserEmail" name="newUserEmail" required>

      <label for="newUserPermissions">Permissions:</label>
      <input type="text" id="newUserPermissions" name="newUserPermissions" placeholder="Séparées par des virgules">

      <label for="newUserPassword">Password:</label>
      <input type="text" id="newUserPassword" name="newUserPassword" placeholder="Entrer le password">

      <button type="submit">Créer</button>
    </form>
  </div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Récupérer et afficher les utilisateurs au chargement de la page
      fetch('/dashboard')
          .then(response => response.json())
          .then(users => {
              const tableBody = document.getElementById('userTableBody');

              users.forEach(user => {
                  const row = tableBody.insertRow();
                  row.insertCell(0).textContent = user.name;
                  row.insertCell(1).textContent = user.email;
                  row.insertCell(2).textContent = user.permission;
                  row.insertCell(3).textContent = user.password;
              });
          })
          .catch(error => {
              console.error('Erreur lors de la récupération des utilisateurs:', error);
          });

      // Cibler le bouton "Créer un utilisateur"
      var createUserBtn = document.getElementById("createUserBtn");

      // Vérifier si le bouton existe avant d'attacher l'événement
      if (createUserBtn) {
          createUserBtn.addEventListener("click", function() {
              document.getElementById("overlay").style.display = "block";
              document.getElementById("createUserModal").style.display = "block";
          });
      }

      // Cibler le formulaire de création d'utilisateur
      var createUserForm = document.getElementById("createUserForm");

      // Vérifier si le formulaire existe avant d'attacher l'événement
      if (createUserForm) {
          createUserForm.addEventListener("submit", function(event) {
              event.preventDefault();

              // Récupérer les valeurs du formulaire
              var userName = document.getElementById("newUserName").value;
              var userEmail = document.getElementById("newUserEmail").value;
              var userPermissions = document.getElementById("newUserPermissions").value;
              var userPassword = document.getElementById("newUserPassword").value;

              // Envoyer la requête POST à la route de création d'utilisateur
              fetch('/ajout', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  },
                  body: JSON.stringify({
                      name: userName,
                      email: userEmail,
                      permission: userPermissions,
                      password: userPassword,
                  }),
              })
              .then(response => response.json())
              .then(data => {
                  // Ajouter une nouvelle ligne au tableau
                  var tableBody = document.querySelector("table tbody");
                  var newRow = tableBody.insertRow(tableBody.rows.length);
                  var nameCell = newRow.insertCell(0);
                  var emailCell = newRow.insertCell(1);
                  var permissionsCell = newRow.insertCell(2);
                  var passwordCell = newRow.insertCell(3);

                  nameCell.textContent = data.name;
                  emailCell.textContent = data.email;
                  permissionsCell.textContent = data.permission.join(", ");
                  passwordCell.textContent = data.password;

                  // Fermer la modal et l'overlay après un certain délai (1 seconde dans cet exemple)
                  setTimeout(function() {
                      document.getElementById("createUserModal").style.display = "none";
                      document.getElementById("overlay").style.display = "none";
                      window.location.reload();
                  }, 1000);
              })
              .catch(error => {
                  console.error('Erreur lors de la création d\'utilisateur:', error);
              });
          });
      }
  });
</script>


</body>
</html>
