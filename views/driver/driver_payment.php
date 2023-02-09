<div class="invoice-container">
  <div class="invoice-header">
    Invoices
  </div>
  <div class="invoice-list">
    <div class="invoice-item">
      <div class="invoice-item-header">
        Invoice #1
        <div class="invoice-item-dropdown-icon" onclick="toggleDetails(event)">
          &#x25BC;
        </div>
      </div>
      <div class="invoice-item-details">
        <p>Customer Name: John Doe</p>
        <p>Invoice Date: 01/01/2022</p>
        <p>Amount: $100.00</p>
      </div>
    </div>
    <div class="invoice-item">
      <div class="invoice-item-header">
        Invoice #2
        <div class="invoice-item-dropdown-icon" onclick="toggleDetails(event)">
          &#x25BC;
        </div>
      </div>
      <div class="invoice-item-details">
        <p>Customer Name: Jane Doe</p>
        <p>Invoice Date: 02/01/2022</p>
        <p>Amount: $200.00</p>
      </div>
    </div>
  </div>
</div>
<script>
    function toggleDetails(event) {
    const details = event.target.parentNode.nextElementSibling;
    if (details.style.display === 'none') {
        details.style.display = 'block';
        event.target.innerHTML = '&#x25B2;';
    } else {
        details.style.display = 'none';
        event.target.innerHTML = '&#x25BC;';
    }
    }

</script>