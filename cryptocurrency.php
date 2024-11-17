<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Kryptowaluty</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>    
    <div class="menu">
        <a href="index.html"><img src="logo-png.png" alt="Logo PKMC Technology" height="75" width="88"></a>
        <div class="button"><span>Matematyka</span>
            <div class="button_list">
                <a href="#">Algebra</a><br>
                <a href="#">Calculus</a><br>
                <a href="#">Geometria</a>
            </div>
        </div>
        <div class="button"><span>Fizyka</span>
            <div class="button_list">
                <a href="#">Mechanika</a><br>
                <a href="#">Optyka</a><br>
                <a href="#">Termodynamika</a>
            </div>
        </div>
        <div class="button"><span>Informatyka</span>
            <div class="button_list">
                <a href="#">Programowanie</a><br>
                <a href="#">Sieci Komputerowe</a><br>
                <a href="#">Cyberbezpieczeństwo</a>
            </div>
        </div>
        <div class="button"><span>Finanse</span>
            <div class="button_list">
                <a href="accounting.html">Bankowość</a><br>
                <a href="#">Inwestowanie</a><br>
                <a href="cryptocurrency.html">Kryptowaluty</a>
            </div>
        </div>
    </div>
<?php
    // Twój klucz API z CoinMarketCap
    $apiKey = 'TWÓJ_KLUCZ_API_COINMARKETCAP';

// Funkcja do pobierania ceny Bitcoina
function fetchBitcoinPrice($apiKey) {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=BTC';

    // Inicjalizacja cURL
        $ch = curl_init();

    // Ustawienia cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-CMC_PRO_API_KEY: $apiKey"]);

    // Wykonanie żądania i pobranie odpowiedzi
    $response = curl_exec($ch);

    // Sprawdzenie błędów
    if (curl_errno($ch)) {
        echo 'Błąd cURL: ' . curl_error($ch);
        return null;
    }

    // Zamknięcie cURL
    curl_close($ch);

    // Przetwarzanie danych JSON
    $data = json_decode($response, true);

    if (isset($data['data']['BTC']['quote']['USD']['price'])) {
        return $data['data']['BTC']['quote']['USD']['price'];
    } else {
        return null;
    }
}

// Pobierz cenę Bitcoina
$btcPrice = fetchBitcoinPrice($apiKey);
?>
    <table>
        <thead>
            <tr>
                <th>Kryptowaluta</th>
                <th>Cena</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bitcoin</td>
                <td><p class="price" id="btc-price">Ładowanie Bitocina...</p></td>
                <td>25</td>
            </tr>
            <tr>
                <td>Ethereum</td>
                <td>Nowak</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Solana</td>
                <td>Zieliński</td>
                <td>28</td>
            </tr>
        </tbody>
    </table>
    <script src="main.js"></script>
    
</body>
</html>