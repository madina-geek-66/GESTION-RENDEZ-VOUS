

<footer class="footer mt-auto py-3 bg-body-tertiary">
  <div class="container">
    <span class="text-body-secondary">&copy; <?php echo date('Y'); ?> CodeBridge IT. Tous droit réservés.</span>
  </div>
</footer>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="DataTables/datatables.min.js"></script>
<script src="js/color_modes.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable({
            "oLanguage": {
                "sSearch": "Rechercher",
                "sLengthMenu": "Afficher _MENU_ Lignes par page",
                "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                "oPaginate": {
                    "sNext": "Suivant",
                    "sPrevious": "Précédent"
                }
            }
        });
    });
</script>
</body>
</html>