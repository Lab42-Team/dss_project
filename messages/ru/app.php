<?php

return [
    /* Пункты главного меню */
    'NAV_HOME' => 'Главная',
    'NAV_ACCOUNT' => 'Учётная запись',
    'NAV_SIGNED_IN_AS' => 'Вы вошли как',
    'NAV_YOUR_PROFILE' => 'Ваш профиль',
    'NAV_HELP' => 'Помощь',
    'NAV_CONTACT_US' => 'Обратная связь',
    'NAV_SIGN_UP' => 'Регистрация',
    'NAV_SIGN_IN' => 'Вход',
    'NAV_SIGN_OUT' => 'Выход',

    /* Пункты правого меню */
    'SIDE_NAV_POSSIBLE_ACTIONS' => 'Возможные действия',

    /* Нижний колонтитул (подвал) */
    'FOOTER_INSTITUTE'=>'ИДСТУ СО РАН',
    'FOOTER_POWERED_BY' => 'Разработано',

    /* Общие кнопки */
    'BUTTON_OK' => 'Ok',
    'BUTTON_ADD' => 'Добавить',
    'BUTTON_SEND' => 'Отправить',
    'BUTTON_SAVE' => 'Сохранить',
    'BUTTON_SIGN_UP' => 'Зарегистрироваться',
    'BUTTON_SIGN_IN' => 'Войти',
    'BUTTON_CREATE' => 'Создать',
    'BUTTON_UPDATE' => 'Обновить',
    'BUTTON_EDIT' => 'Изменить',
    'BUTTON_DELETE' => 'Удалить',
    'BUTTON_CANCEL' => 'Отмена',
    'BUTTON_IMPORT' => 'Импортировать',
    'BUTTON_EXPORT' => 'Экспортировать',
    'BUTTON_RETURN' => 'Вернуться к',

    /* Общие сообщения об ошибках */
    'ERROR_MESSAGE_PAGE_NOT_FOUND' => 'Страница не найдена.',
    'ERROR_MESSAGE_ACCESS_DENIED' => 'Вам не разрешено производить данное действие.',

    /* Общие уведомления на форме с captcha */
    'CAPTCHA_NOTICE_ONE' => 'Пожалуйста, введите буквы, показанные на картинке выше.',
    'CAPTCHA_NOTICE_TWO' => 'Буквы вводятся без учета регистра.',
    'CAPTCHA_NOTICE_THREE' => 'Для смены проверочного кода нажмите на буквы, показанные на картинке выше.',

    /* Общие заголовки сообщений */
    'WARNING' => 'Предупреждение!',
    'NOTICE_TITLE' => 'Обратите внимание',
    'NOTICE_TEXT' => 'на эту важную информацию.',

    /* Страницы сайта */
    /* Страница ошибки */
    'ERROR_PAGE_TEXT_ONE' => 'Вышеупомянутая ошибка произошла при обработке веб-сервером вашего запроса.',
    'ERROR_PAGE_TEXT_TWO' => 'Пожалуйста, свяжитесь с нами, если Вы думаете, что это ошибка сервера. Спасибо.',
    /* Страница обратной связи */
    'CONTACT_US_PAGE_TITLE' => 'Обратная связь',
    'CONTACT_US_PAGE_TEXT' => 'Если у вас есть деловое предложение или другие вопросы, пожалуйста,
        заполните следующую форму, чтобы связаться с нами. Спасибо.',
    'CONTACT_US_PAGE_SUCCESS_MESSAGE' => 'Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.',
    /* Страница входа */
    'SIGN_IN_PAGE_TITLE' => 'Вход',
    'SIGN_IN_PAGE_TEXT' => 'Пожалуйста, заполните следующие поля для входа:',
    'SIGN_IN_PAGE_RESET_TEXT' => 'Если Вы забыли свой пароль, то Вы можете',
    'SIGN_IN_PAGE_RESET_LINK' => 'сбросить его',

    /* Формы */
    /* ContactForm */
    'CONTACT_FORM_NAME' => 'ФИО',
    'CONTACT_FORM_EMAIL' => 'Электронная почта',
    'CONTACT_FORM_SUBJECT' => 'Тема',
    'CONTACT_FORM_BODY' => 'Сообщение',
    'CONTACT_FORM_VERIFICATION_CODE' => 'Проверочный код',
    /* LoginForm */
    'LOGIN_FORM_USERNAME' => 'Имя пользователя',
    'LOGIN_FORM_PASSWORD' => 'Пароль',
    'LOGIN_FORM_REMEMBER_ME' => 'Запомнить меня',
    /* Сообщения LoginForm */
    'LOGIN_FORM_MESSAGE_INCORRECT_USERNAME_OR_PASSWORD' => 'Неверное имя пользователя или пароль.',
    'LOGIN_FORM_MESSAGE_BLOCKED_ACCOUNT' => 'Ваш аккаунт заблокирован.',
    'LOGIN_FORM_MESSAGE_NOT_CONFIRMED_ACCOUNT' => 'Ваш аккаунт не подтвержден.',

    /* Модели */
    /* Lang */
    'LANG_MODEL_ID' => 'ID',
    'LANG_MODEL_CREATED_AT' => 'Создан',
    'LANG_MODEL_UPDATED_AT' => 'Обновлен',
    'LANG_MODEL_URL' => 'URL',
    'LANG_MODEL_LOCAL' => 'Локаль',
    'LANG_MODEL_NAME' => 'Название',
    'LANG_MODEL_DEFAULT' => 'Язык по умолчанию',
    /* User */
    'USER_MODEL_ID' => 'ID',
    'USER_MODEL_CREATED_AT' => 'Зарегистрирован',
    'USER_MODEL_UPDATED_AT' => 'Обновлен',
    'USER_MODEL_USERNAME' => 'Логин',
    'USER_MODEL_PASSWORD' => 'Пароль',
    'USER_MODEL_AUTH_KEY' => 'Ключ аутентификации',
    'USER_MODEL_EMAIL_CONFIRM_TOKEN' => 'Метка подтверждения электронной почты',
    'USER_MODEL_PASSWORD_HASH' => 'Хэш пароля',
    'USER_MODEL_PASSWORD_RESET_TOKEN' => 'Метка сброса пароля',
    'USER_MODEL_TYPE' => 'Тип',
    'USER_MODEL_STATUS' => 'Статус',
    'USER_MODEL_FULL_NAME' => 'Фамилия Имя Отчество',
    'USER_MODEL_EMAIL' => 'Электронная почта',
    'USER_MODEL_DISCIPLINE' => 'Область интересов',
    'USER_MODEL_COMPETENCE' => 'Компетентность',
    /* Сообщения модели User */
    'USER_MODEL_MESSAGE_USERNAME' => 'Это имя пользователя уже занято.',
    'USER_MODEL_MESSAGE_UPDATED_YOUR_DETAILS' => 'Вы успешно изменили свои данные.',
    'USER_MODEL_MESSAGE_UPDATED_YOUR_PASSWORD' => 'Вы успешно изменили пароль.',
    /* Task */
    'TASK_MODEL_ID' => 'ID',
    'TASK_MODEL_CREATED_AT' => 'Создана',
    'TASK_MODEL_UPDATED_AT' => 'Обновлена',
    'TASK_MODEL_NAME' => 'Название',
    'TASK_MODEL_DESCRIPTION' => 'Описание',
    /* Alternative */
    'ALTERNATIVE_MODEL_ID' => 'ID',
    'ALTERNATIVE_MODEL_CREATED_AT' => 'Создана',
    'ALTERNATIVE_MODEL_UPDATED_AT' => 'Обновлена',
    'ALTERNATIVE_MODEL_NAME' => 'Название',
    'ALTERNATIVE_MODEL_DESCRIPTION' => 'Описание',
    'ALTERNATIVE_MODEL_TASK' => 'Задача',
    /* Criteria */
    'CRITERIA_MODEL_ID' => 'ID',
    'CRITERIA_MODEL_CREATED_AT' => 'Создан',
    'CRITERIA_MODEL_UPDATED_AT' => 'Обновлен',
    'CRITERIA_MODEL_NAME' => 'Название',
    'CRITERIA_MODEL_DESCRIPTION' => 'Описание',
    'CRITERIA_MODEL_TASK' => 'Задача',
    /* CriteriaValue */
    'CRITERIA_VALUE_MODEL_ID' => 'ID',
    'CRITERIA_VALUE_MODEL_CREATED_AT' => 'Создано',
    'CRITERIA_VALUE_MODEL_UPDATED_AT' => 'Обновлено',
    'CRITERIA_VALUE_MODEL_PRIORITY' => 'Приоритет',
    'CRITERIA_VALUE_MODEL_VALUE' => 'Значение',
    'CRITERIA_VALUE_MODEL_CRITERIA' => 'Критерий',
    /* SpecificAlternative */
    'SPECIFIC_ALTERNATIVE_MODEL_ID' => 'ID',
    'SPECIFIC_ALTERNATIVE_MODEL_CREATED_AT' => 'Создана',
    'SPECIFIC_ALTERNATIVE_MODEL_UPDATED_AT' => 'Обновлена',
    'SPECIFIC_ALTERNATIVE_MODEL_ALTERNATIVE' => 'Альтернатива',
    'SPECIFIC_ALTERNATIVE_MODEL_CRITERIA' => 'Критерий',
    /* Decision */
    'DECISION_MODEL_ID' => 'ID',
    'DECISION_MODEL_CREATED_AT' => 'Создано',
    'DECISION_MODEL_UPDATED_AT' => 'Обновлено',
    'DECISION_MODEL_TASK' => 'Задача',
    'DECISION_MODEL_USER' => 'Пользователь',
    /* Evaluation */
    'EVALUATION_MODEL_ID' => 'ID',
    'EVALUATION_MODEL_CREATED_AT' => 'Создана',
    'EVALUATION_MODEL_UPDATED_AT' => 'Обновлена',
    'EVALUATION_MODEL_EVALUATION' => 'Задача',
    'EVALUATION_MODEL_DECISION' => 'Решение',
    'EVALUATION_MODEL_ALTERNATIVE' => 'Альтернатива',
];