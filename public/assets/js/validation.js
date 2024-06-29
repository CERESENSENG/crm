document.addEventListener('DOMContentLoaded', function() {
  const paymentForm = document.getElementById('paymentForm');
  const amountToPayInput = document.getElementById('amount-to-pay');
  const amountError = document.getElementById('amount-error');

  paymentForm.addEventListener('submit', function(event) {
      const amountToPayValue = amountToPayInput.value.trim();

      // Validate amount to pay
      if (!validateAmountToPay(amountToPayValue)) {
          amountError.style.display = 'block';
          event.preventDefault(); // Prevent form submission
      } else {
          amountError.style.display = 'none';
      }
  });

  amountToPayInput.addEventListener('input', function() {
      formatAmount(amountToPayInput);
  });
});

function validateAmountToPay(amount) {
  // Regex to validate amount in the format 1234567890.00
  const amountPattern = /^\d{1,10}\.\d{2}$/;
  return amountPattern.test(amount);
}

function formatAmount(input) {
  let value = input.value;
  // Remove any non-numeric characters except the dot
  value = value.replace(/[^0-9.]/g, '');

  // Ensure there is only one dot
  const parts = value.split('.');
  if (parts.length > 2) {
      value = parts[0] + '.' + parts.slice(1).join('');
  }

  // Add trailing ".00" if only whole number is entered
  if (parts.length === 1) {
      value = parts[0] + '.00';
  }

  // Limit to two decimal places
  if (parts[1] && parts[1].length > 2) {
      parts[1] = parts[1].substring(0, 2);
      value = parts.join('.');
  }

  input.value = value;
}
