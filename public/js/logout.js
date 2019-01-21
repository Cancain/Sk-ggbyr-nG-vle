const logOutBtn = document.getElementById('logOutBtn');

logOutBtn.addEventListener('click', () => {
    destroy_session();
})

function destroy_session() {
    var xmlhttp = getXmlHttp();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', '../controllers/destroy_session.php', true);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        }
    };
    xmlhttp.send(null);
}