# Roistat SDK
Библиотека для работы с API Roistat v1 (https://roistat.api-docs.io/v1/)

## Требования

*PHP* >= 5.4.0  
*guzzlehttp/guzzle* >= 5.4.0

## Установка

Добавить в composer.json новый пакет и произвести composer install(или update ежели у вас уже он установлен).  
Подробнее можно почитать хотя бы туть - https://habr.com/post/145946/

```
{
  "require": {
    "dangetsu/roistat-sdk": "dev-master"
  }
}
```

## Использование

Сперва нужно инициализировать библиотеку для дальнейшей работы.
```
require_once 'vendor/autoload.php';

$roistat = new \Analytics\Roistat($apiKeyFromProfile, $projectId);
```
* **projectId** - может быть равен 0, если вы хотите обратиться к общему методу получения списка проектов. 
Но если потребуется обратиться к какому-нибудь методу проекта, то придется заново объявять объект.

Для того что бы сделать какое-либо действие, нам нужно обратиться к схеме, которая это действие осуществляет.
В качестве параметра, конструктор принимает базовый объект приложения.
```
$callScheme = new \Analytics\Scheme\Calltracking\Call($roistat);
```

Схема в свою очередь предоставляет базовый набор методов которое ей доступны. Например у схемы списка звонков доступны следующие методы:
```
$callScheme->items();
$callScheme->create(new Entity\Calltracking\Call());
$callScheme->update(new Entity\Calltracking\Call());
```

* **items()** - Возвращает список сущностей, параметры которых можно получать через геттеры, а так же, напрямую вызывать update, delete и т.д.  
В большинстве случаев, этот метод принимает в себя параметр для фильтрации и сортировки запросов.
```
$calls = $callScheme->items((new \Analytics\Engine\Query())->addFilter('callee', '=', '79780000000')->setSort('id', 'desc')->setLimit(1));
$calls[0]->setComment('Тестовый комментарий')
            ->setOrderId('22')
            ->setLink('https://site.ru/calltracking/call/23/file/123456qwerty')
            ->update();
```

* **create()** и **update()** - Принимают готовую сущность для отправки и возвращают либо статус об успехе либо такую же сущность только с *id*
```
$call = (new Entity\Calltracking\Call())
            ->setCallee('7495301234')
            ->setCaller('7495301234')
            ->setDuration(59)
            ->setStatus('ANSWER')
            ->setDate('2016-06-19T09:31:01+0000')
            ->setVisitId('666')
            ->setOrderId('777')
            ->setSaveToCrm(0);
$call = $callScheme->create($call);
```

Ознакомиться более подробно с использованием библиотеки можно изучив код в папке **test**

## Соотношение методов и схем

##### Проекты
* **/user/projects** - (Scheme\Project())->items()
* **/user/project/create** - (Scheme\Project())->create()
* **/project/settings/counter/list** - (Scheme\Counter())->get()
##### Визиты
* **/project/site/visit/list** - (Scheme\Visit())->items(Engine\Query)
##### Клиенты
* **/project/clients/import** - (Scheme\Client())->create(Entity\Client[])
* **/project/clients** - (Scheme\Client())->items(Engine\Query)
##### Заказы
* **/project/integration/order/list** - (Scheme\Order())->items(Engine\Query)
* **/project/add-orders** - (Scheme\OrderAdd())->create(Entity\OrderAdd[])
* **/project/orders/{orderId}/external-url** - (Scheme\Order())->externalUrl(string $orderId)
* **/project/set-statuses** - (Scheme\Status())->create(Entity\Status[])
* **/project/analytics/order-custom-fields** - (Scheme\Order())->customFields()
* **/project/integration/order/{orderId}/status/update** - (Scheme\Order())->statusUpdate(string $orderId, string $statusId)
* **/project/integration/order/{orderId}/delete** - (Scheme\Order())->delete(string $orderId)
##### Проксилиды
* **/project/proxy-leads** - (Scheme\Proxylead())->items()
* **/project/proxy-leads/{proxyLeadId}** - (Scheme\Proxylead())->get(string $leadId)
##### Коллтрекинг
* **/project/calltracking/script/create** - (Scheme\Calltracking\Script())->create(Entity\Calltracking\Script)
* **/project/calltracking/script/list** - (Scheme\Calltracking\Script())->items(Engine\Query)
* **/project/calltracking/script/delete** - (Scheme\Calltracking\Script())->delete(int $scriptId)
* **/project/calltracking/script/update** - (Scheme\Calltracking\Script())->update(Entity\Calltracking\Script)
* **/project/calltracking/data** - (Scheme\Calltracking\Data())->items(DateTime $from, DateTime $to)
* **/project/calltracking/call/xls/export** - Нет поддержки
* **/project/calltracking/call/{callId}/file** - Нет поддержки
* **/project/calltracking/call/update** - (Scheme\Calltracking\Call())->update(Entity\Calltracking\Call)
* **/project/calltracking/phone/buy** - На очереди
* **/project/calltracking/phone/update** - На очереди
* **/project/calltracking/phone/create** - На очереди
* **/project/calltracking/phone/delete** - На очереди
* **/project/calltracking/phone/prefix/list** - На очереди
* **/project/calltracking/phone/list** - (Scheme\Calltracking\Phone())->items(Engine\Query)
* **/project/calltracking/call/list** - (Scheme\Calltracking\Call())->items(Engine\Query)
* **/project/phone-call** - (Scheme\Calltracking\Call())->create(Entity\Calltracking\Call)
##### Рекламные каналы
* В разработке
##### Статистика
* В разработке
##### Доступ
* В разработке
##### Индикаторы проекта
* В разработке
##### Смс отчеты
* В разработке
##### Аналитика
* В разработке
##### Биллинг
* В разработке