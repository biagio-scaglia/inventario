document.addEventListener("DOMContentLoaded", () => {
    fetch("getData.php")
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("#inventory tbody");
            data.forEach(product => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${product.nome}</td>
                    <td>${product.descrizione}</td>
                    <td>${product.quantita}</td>
                    <td>€${product.prezzo}</td>
                `;
                tbody.appendChild(row);

                if (product.quantita < 5) {
                    const alert = document.createElement("div");
                    alert.textContent = `Scorte basse: ${product.nome}`;
                    alert.style.color = "red";
                    document.querySelector("#alerts").appendChild(alert);
                }
            });
        });

    document.getElementById("generate-report").addEventListener("click", () => {
        const doc = new jsPDF();
        doc.text("Report Inventario", 10, 10);
        doc.save("report_inventario.pdf");
    });
});
