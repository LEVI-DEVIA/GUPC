<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tableau de bord</h2>
        
        <div class="mb-3">
            <a href="{{ url('/ajouter_utilisateur') }}" class="btn btn-primary">Ajouter un utilisateur</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <!-- Utilisateurs seront affichés ici dynamiquement -->
            </tbody>
        </table>
    </div>

    <script>
        // Ajoutez un script pour récupérer et afficher les utilisateurs au chargement de la page
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/utilisateurs')
                .then(response => response.json())
                .then(users => {
                    const tableBody = document.getElementById('userTableBody');

                    users.forEach(user => {
                        const row = tableBody.insertRow();
                        row.insertCell(0).textContent = user.name;
                        row.insertCell(1).textContent = user.email;
                        row.insertCell(2).textContent = user.permission;
                        row.insertCell(3).textContent = user.password;
                        // Ajoutez des cellules supplémentaires ou des boutons d'édition/suppression si nécessaire
                    });
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des utilisateurs:', error);
                });
        });
    </script>
@endsection
