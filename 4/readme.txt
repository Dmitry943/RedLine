Имеется база клиентов. Допустим что база большая и рассылка может занимать длительное время.

Однозначно нужно вести лог (в текстовый файл). Запуск обработчика, выполненные операции.
Это позволит производить мониторинг, обнаруживать возможные сбои в работе.

Отправку писем можно производить как с сервера на котором расположен сайт (php функция "mail"), так и с использованием сервиса рассылок (например mailerlite.com).

Пишем обработчик и добавляем задание в cron.
На сервере могут быть сбои (проблемы с хостингом).
База большая и нельзя отправить все письма за один раз.
Поэтому рассылка происходит поэтапно.
Запуск обработчика раз в пять (или три) минут. Время на обработку 20 секунд.

В базу клиентов добавляем поле "письмо отправлено".

Создаем таблицу в которой хранятся данные об очереди запуска обработчика (чтобы исключить возможность одновременного запуска двух копий обработчика).

Создаем таблицу в которой хранятся данные о запланированных рассылках и статусе (выполняется, завершена).

При запуске обработчик:
1 проверяет не запущена ли в данный момент другая копия обработчика
2 проверяет завершена ли запланированная рассылка (рассылка начата, но еще не закончена)
2.1 если не завершена, то продолжаем ее
2.2 если завершена, то проверяем в базе не наступило ли время очередной рассылки или время "ежемесячной" рассылки

Этап (итерация) рассылки:
- в базе клиентов очищаем поле "письмо отправлено" у всех записей (только для первой итерации) и ставим статус рассылки "выполняется"
- получаем список клиентов, которые не получили письма
- отправляем письмо, в базе клиентов в поле "письмо отправлено" пишем true, проверяем лимит времени, продолжаем
- если все письма отправлены, меняем статус на "завершена"

Ранее приходилось решать задачу "Рассылка новостей сайта"
http://dvglog.tw1.ru/log/3
