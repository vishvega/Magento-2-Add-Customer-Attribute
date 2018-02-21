# Add Custom Customer Attribute for Magrnto 2

Magento’s customer attributes provide the information required to support the order, fulfillment, and customer management processes. Because your business is unique, you might need fields in addition to those provided by the system. You can add custom attributes to the Account Information, Address Book, and Billing Information sections of the customer’s account. Customer address attributes can also be used in the Billing Information section during checkout, or when guests register for an account. 

By default only Magento Enterprise has the ability to add customer attributes using the backend/admin panel. For Magento community editions, you may have to create your own custom module to do that.

##Installation 

Step 1: Download the extension

Step 2: Unzip the file in a temporary directory

Step 3: Upload it to your Magento installation root directory -> app->code

Step 4: Disable the cache under System­ >> Cache Management (Not mandatory)

Step 5: Enter the followings at the command line, one after another: 

php bin/magento setup:upgrade

php bin/magento setup:di:compile

php bin/magento setup:static-content:deploy en_US (This may change depending on your store language)

php bin/magento indexer:reindex

php bin/magento cache:clean
