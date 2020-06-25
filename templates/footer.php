
    <footer class="section">
        <div class="center grey-text">Copyrate 2020 Ninja Pizza</div>
        <div class="center grey-text">Made by 
            <?php 
                $name = $_SESSION['name'] ?? 'Me';
                echo htmlspecialchars ($name);
            ?>
        </div>
    </footer>
</body>
</html>