const apiKey = 'da781701-d521-4cde-8d56-960927da96c4';

async function fetchBitcoinPrice() {
    try {
        const response = await fetch('https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=BTC', {
            method: 'GET',
            headers: {
                'X-CMC_PRO_API_KEY': apiKey
            }
        });

        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

        const data = await response.json();
        const price = data.data.BTC.quote.USD.price;

        document.getElementById('btc-price').textContent = `$${price.toFixed(2).toLocaleString()}`;
        document.getElementById('error-message').textContent = ''; // Usuwanie błędów, jeśli dane załadują się poprawnie
    } catch (error) {
        console.error('Błąd:', error);
        document.getElementById('btc-price').textContent = 'Nie udało się pobrać ceny';
        document.getElementById('error-message').textContent = 'Sprawdź połączenie z internetem lub klucz API.';
    }
}

fetchBitcoinPrice();
setInterval(fetchBitcoinPrice, 30000);