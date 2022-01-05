# mandabem-api


### SDK criada para realizar integrações php com a api do mandabem


### Instalação

composer install pushinbr/mandabem-api

### USO

#### Consultar o valor de um frete





```php

$mandabem = new \Pushinbr\Mandabem('API_TOKEN', 'APP_ID');


$shippingValue = $mandabem->getShippingValue([
    'cep_origem' => '111111111',
    'cep_destino' => '111111111',
    'altura' => 0.3,
    'largura' => 0.3,
    'comprimento' => 0.3,
    'peso' => 0.8,
    'servico' => \Pushin\TiposServico::$PACMINI,
    'products' => [
        [
            'nome' => 'teste',
            'quantidade' => 1,
            'preco' => 30
        ]
    ]
]);

```

#### Enviar um pacote

```php

$mandabem = new \Pushinbr\Mandabem('API_TOKEN', 'APP_ID');

$products = [
    [
        'nome' => 'teste',
        'quantidade' => 1,
        'preco' => 30
    ]
];



$send_post = $mandabem->sendOrder([
        'forma_envio' => \Pushinbr\TiposServico::$PAC,
        'cep_origem' => '111111111',
        'destinatario' => 'Fulano de tal',
        'cpf_destinatario' => '111111111',
        'email' => 'email@cliente.com',
        'cep' => '111111111', // CEP DE ENTREGA
        'logradouro' => 'Av paulista',
        'numero' => 10,
        'complemento' => '',
        'bairro' => 'Jardim teste',
        'cidade' => 'São Paulo',
        'estado' => 'SP',
        'peso' => 1,
        'altura' => 1,
        'largura' => 1,
        'comprimento' => 1,
        'ref_id' => 'SEU ID',
        'produtos' => $products
]);

```



#### Consultar stattus de um envio

```php

$mandabem = new \Pushinbr\Mandabem('API_TOKEN', 'APP_ID');

$status = $mandabem->getStatusObject(['id' => '123456']); // (ID do envio gerado anteriormente, Opcional quando "ref_id" for informado)

// OU

$status = $mandabem->getStatusObject(['ref_id' => '123456']); // (ID de referência do pedido informado na geração do envio, Opcional quando "id" for informado)

```
