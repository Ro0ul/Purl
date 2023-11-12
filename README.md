# Purl
A Http Client used to send requests

## Usage

### Sending A Request

```php
  $client = new \Roul\Purl\Http\Client();
  $response = $client->request(
    method: "GET",
    header: $headers,
    options: $options
  );

  echo $response->getBody(); # Get Request Body
  ```

  ## A Documentation is coming soon...
