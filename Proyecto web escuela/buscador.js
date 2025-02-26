document.addEventListener("keyup", e => {
    if (e.target.matches("#buscador")) {
        if (e.key === "Escape") e.target.value = "";

        document.querySelectorAll("table tbody tr").forEach(row => {
            let shouldHide = true;
            row.querySelectorAll("td").forEach(cell => {
                if (cell.textContent.toLowerCase().includes(e.target.value.toLowerCase())) {
                    shouldHide = false;
                }
            });
            shouldHide ? row.classList.add("filtro") : row.classList.remove("filtro");
        });
    }
    console.log(e.target.value);
});
