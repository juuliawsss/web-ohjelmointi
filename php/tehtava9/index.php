
<?php
// Simple router for page content
$page = $_GET['page'] ?? 'index';
include 'includes/header.php';
?>

<div class="container">
    <?php if ($page === 'index'): ?>
        <h2>Tervetuloa!</h2>
        <p>Katso <a class="menu-link-btn" href="ruokalista.php">ruokalista</a> tai <a href="?page=varaus">varaa pöytä</a> helposti.</p>
    <?php elseif ($page === 'ruokalista'): ?>
        <?php include 'ruokalista.php'; ?>
    <?php elseif ($page === 'varaus'): ?>
        <?php include 'varaus.php'; ?>
    <?php else: ?>
        <h2>Sivua ei löytynyt</h2>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>





