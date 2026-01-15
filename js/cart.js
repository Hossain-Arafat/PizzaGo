
    function formatMoney(num) {
        return "$" + num.toFixed(2);
    }

    function updateRowSubtotal(row) {
        const price = parseFloat(row.getAttribute("data-price"));
        const qty = parseInt(row.querySelector(".qty-value").innerText);
        const subtotal = price * qty;
        row.querySelector(".subtotal-cell").innerText = formatMoney(subtotal);
        return subtotal;
    }

    function updateSummary() {
        const rows = document.querySelectorAll(".cart-row");
        let subtotalSum = 0;

        rows.forEach(function(row){
            subtotalSum += updateRowSubtotal(row);
        });

        const tax = subtotalSum * 0.10;
        const total = subtotalSum + tax;

        document.getElementById("sumSubtotal").innerText = formatMoney(subtotalSum);
        document.getElementById("sumTax").innerText = formatMoney(tax);
        document.getElementById("sumTotal").innerText = formatMoney(total);
    }

    // Setup buttons
    document.querySelectorAll(".cart-row").forEach(function(row){
        const minus = row.querySelector(".qty-minus");
        const plus = row.querySelector(".qty-plus");
        const qtyEl = row.querySelector(".qty-value");
        const del = row.querySelector(".delete-btn");

        plus.addEventListener("click", function(){
            let q = parseInt(qtyEl.innerText);
            qtyEl.innerText = q + 1;
            updateSummary();
        });

        minus.addEventListener("click", function(){
            let q = parseInt(qtyEl.innerText);
            if (q > 1) {
                qtyEl.innerText = q - 1;
                updateSummary();
            }
        });

        del.addEventListener("click", function(){
            row.remove();
            updateSummary();
        });
    });

    // Initial totals
    updateSummary();

