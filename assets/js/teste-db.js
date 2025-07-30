document.getElementById('testDbBtn').addEventListener('click', () => {
    fetch('test_db.php')
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            alert("Erro inesperado: " + error);
        });
});