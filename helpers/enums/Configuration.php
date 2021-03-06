<?php

	namespace abhimanyu\installer\helpers\enums;

	use abhimanyu\enum\helpers\BaseEnum;

	class Configuration extends BaseEnum
	{
		// Basic Configs
		const APP_NAME           = 'app.name';
		const APP_TOUR           = 'app.tour';
		const APP_SECRET         = 'app.secret';
		const APP_BACKEND_THEME  = 'app.backend.theme';
		const APP_FRONTEND_THEME = 'app.frontend.theme';
		const APP_INSTALLED = 'installed';

		// Cache
		const CACHE_CLASS = 'cache.class';

		// Admin
		const ADMIN_INSTALL_ID = 'admin.installationId';
		const ADMIN_EMAIL      = 'admin.email';

		// Yii2-User
		const USER_REGISTRATION                = 'user.enableRegistration';
		const USER_PASSWORD_RESET_TOKEN_EXPIRE = 'user.passwordResetTokenExpire';

		// Config File
		const CONFIG_FILE = 'dynamicConfigFile';

		// Migrations Folder
		const MIGRATE_FOLDER = 'migrateFolder';

		// Mailer
		const MAILER_USE_TRANSPORT = 'mail.useTransport';
		const MAILER_HOST          = 'mail.host';
		const MAILER_USERNAME      = 'mail.username';
		const MAILER_PASSWORD      = 'mail.password';
		const MAILER_PORT          = 'mail.port';
		const MAILER_ENCRYPTION    = 'mail.encryption';
	}