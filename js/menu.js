
    const cards = document.querySelectorAll(".menu-card");

    cards.forEach(function(card) {
        const minusBtn = card.querySelector(".qty-minus");
        const plusBtn = card.querySelector(".qty-plus");
        const qtyInput = card.querySelector(".qty-value");
        const hiddenQty = card.querySelector(".qty-hidden");

        if (!minusBtn || !plusBtn || !qtyInput || !hiddenQty) return;

        function syncQty() {
            hiddenQty.value = qtyInput.value; // update hidden input
        }

        plusBtn.addEventListener("click", function() {
            let current = parseInt(qtyInput.value);
            qtyInput.value = current + 1;
            syncQty();
        });

        minusBtn.addEventListener("click", function() {
            let current = parseInt(qtyInput.value);
            if (current > 1) {
                qtyInput.value = current - 1;
                syncQty();
            }
        });

        syncQty(); // initial sync
    });
