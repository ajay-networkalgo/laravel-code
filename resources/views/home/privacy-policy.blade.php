@extends('layout.frontend')
@section('page-content')
<style>
    .over-tabs table tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .over-tabs table tr:nth-child(1) {
        border: 1px solid #fff;
    }

    .over-tabs table tr td {
        width: auto;
        padding: 15px;
        text-align: center;
        border: 1px solid #fff;
    }
</style>
<!-- hero section -->
<section class="pb-24 pt-24 md:pt-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-[60px]">
            <div class="lg:pb-6 border-b border-[#C8C8C8]">
                <h1 class="font-primary font-medium text-[42px] leading-[56px]  lg:text-[80px] lg:leading-[88px] text-primary-black">Privacy Policy</h1>
            </div>
            <div class="flex flex-col gap-12">
                <div class="flex flex-col gap-5">
                    <p class="font-secondary text-base leading-[24px]">
                        Olax Power Network Technology (Zhejiang) Co. , Ltd. and its affiliates (collectively, "Olax Power", "we", "us", and "our") respect your privacy. Please read the following to learn more about our Privacy Policy ("this Policy") before you provide your personal data. This Policy applies to Olax Power websites, products, and services that display or provide links to this Policy.
                    </p>

                    <p class="font-secondary text-base leading-[24px]">
                        This Policy describes how Olax Power processes your personal data, but it may not address all possible data processing scenarios. Olax Power may inform you of product or service-specific data collection through supplementary policies or notices provided before collection.
                    </p>
                    <span class="font-secondary text-base leading-[24px] font-bold">This Policy describes:</span>
                    <ul class="list-disc pl-3">
                        <li>How We Collect & Use Your Personal Data</li>
                        <li>Cookies & Similar Technologies</li>
                        <li>How We Disclose Personal Data</li>
                        <li>How to Access & Control Your Personal Data</li>
                        <li>How We Protect Your Personal Data</li>
                        <li>How We Process Children’s Personal Data</li>
                        <li>Third-Party Providers and Their Services</li>
                        <li>International Transfers of Your Personal Data</li>
                        <li>Updates to This Policy</li>
                        <li>How to Contact Us</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-5">
                    <span class="font-secondary text-2xl leading-[28px] font-bold">I. How We Collect & Use Your Personal Data</span>

                    <span class="font-secondary text-lg leading-[28px] font-bold">I.1 How we collect your personal data</span>
                    <p class="font-secondary text-base leading-[24px]">
                        Personal data means any data that, either on its own or jointly with other data, can be used to identify a natural person. By using Olax Power products or services, you may need to provide personal data. These personal data can be different according the different products or services. In some cases, you may be able to opt not to disclose your personal data to Olax Power. However, not providing Olax Power with certain data may mean that we cannot provide you with certain products or services or respond to an issue that you have raised. Olax Power will only use your personal data for the purpose on this policy.
                    </p>

                    <ol class="flex flex-col gap-5">
                        <li class="font-secondary text-base leading-[24px]">I.1.1 You directly provide us with such data</li>
                        <ul class="list-disc pl-3">
                            <li class="font-secondary text-base leading-[24px]">Account information. When you register Olax Power account, you may need to provide your name, account, password, Email and phone number, etc.</li>
                            <li class="font-secondary text-base leading-[24px]">Contact information. When you contact us for supporting and suggestion, attend our online/offline event, subscribe our marketing notification(We won’t do customer portrait and only send you notification with your approval. Your name may be used at contacting. You can opt out at any time), you may provide your name, company name, title, Email and phone number, etc.</li>
                        </ul>
                        <li class="font-secondary text-base leading-[24px]">I.1.2 Obtain data when Interact with us or using our products and services</li>
                        <ul class="list-disc pl-3">
                            <li class="font-secondary text-base leading-[24px]">Products and network information. We may collect your products information, e.g. device location, Longitude & Latitude, device type or device name, device SN, device ID, firmware version, language, etc.</li>
                            <li class="font-secondary text-base leading-[24px]">The user’s SIM card-related thing card number, IC card ID, International Mobile Subscriber ID, and recharge transaction record (including buyer login account number, order number, order title, order amount, payment method, etc.) using the GPRS module. Trading time and other relevant information. The above recharge record information will be deleted automatically 6 months after the start of the transaction.</li>
                            <li class="font-secondary text-base leading-[24px]">Interaction information. You may provide us your personal information when you interact with us by using our website, product and service, e.g. the content of messages you send us, such as the query information you provide, or the questions or information you provide for customer service support.</li>
                            <li class="font-secondary text-base leading-[24px]">Device log. When you using our products and services to check our contents, we will automatically collect the necessary log, e.g. server login time, event (e.g. fault, crash, reboot, update), etc.</li>
                        </ul>

                        <li class="font-secondary text-base leading-[24px]">I.1.3 Obtain data from public and commercial third-party sources</li>
                        <ul class="list-disc pl-3">
                            <li class="font-secondary text-base leading-[24px]">As permitted by law, we may also obtain non-personally identifiable information(Non-PII) from public and commercial third-party sources, like acquiring map from Google Map, and weather condition from Qweather etc.. Non-PII is information that cannot be used to identify a particular individual. For example, purchasing statistics from other companies to support our services.</li>
                            <li class="font-secondary text-base leading-[24px]">Olax Power will collect statistical data, such as the numbers of visits to its website. We collect this data to understand how users use our websites, products, and services so that we can improve our services and better satisfy your needs. Olax Power may collect, use, process, transfer, or disclose non-PII for other purposes at its own discretion.</li>
                            <li class="font-secondary text-base leading-[24px]">We will endeavor to isolate your personal data from non-PII and ensure that the two types of data are used separately. If personal data is combined with non-PII, it will still be treated as personal data during processing.</li>
                        </ul>
                    </ol>

                    <!--2nd -->
                    <span class="font-secondary text-lg leading-[24px] font-bold">I.2. How we use your personal data</span>

                    <p class="font-secondary text-base leading-[24px]">We may use your personal data for the following purposes:
                    </p>

                    <!-- <span class="font-secondary text-base leading-[24px] font-bold">III. Proprietary Rights</span> -->
                    <ul class="list-disc pl-3">
                        <li class="font-secondary text-base leading-[24px]">Creating account. We will create an account for who are interested at our products and services. This account can be your identification to login our products and services. We may also send your important information through this account.</li>
                        <li class="font-secondary text-base leading-[24px]">Respond your request. When you visit our website, attend our online/offline event asking for services (e.g. products and services specification, marketing material, etc) and any products support.</li>
                        <li class="font-secondary text-base leading-[24px]">Contacting you with your consent; sending you information about products and services that may interest you; inviting you to participate in Olax Power activities (including promotional activities), market surveys, or satisfaction surveys; or sending you marketing information. You can opt out by disabling the agreement at software or sending the email to <a href="mailto:info@Olaxpower.com" class="text-blue-500">info@Olaxpower.com</a>.</li>
                        <li class="font-secondary text-base leading-[24px]">Others:</li>
                        <li class="font-secondary text-base leading-[24px]">Troubleshooting for your feedback the fault report.</li>
                        <li class="font-secondary text-base leading-[24px]">To protect products, service and customers’ security, improve our anti-fraud plan.</li>
                        <li class="font-secondary text-base leading-[24px]">To comply with local law, industry standard or our policy.</li>

                    </ul>

                    <div class="over-tabs overflow-x-scroll">
                        <table class="">
                            <thead>
                                <tr class="firstRow">
                                    <td>
                                        <p>Categories of Data</p>
                                    </td>
                                    <td>
                                        <p>Description</p>
                                    </td>
                                    <td>
                                        <p>Purpose</p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Contact Information</p>
                                    </td>
                                    <td>
                                        <p>Your name, email, CC email, phone number, address, post code, country, company name, title, etc.</p>
                                    </td>
                                    <td>
                                        <p>To communicate with you, process your request, after-sales, password reset, delete account, warranty binding, create account. With your consent, sending you information about products, services and marketing information.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Account information</p>
                                    </td>
                                    <td>
                                        <p>Account name, account password</p>
                                    </td>
                                    <td>
                                        <p>Reset password, change account name</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Communications or interactions</p>
                                    </td>
                                    <td>
                                        <p>Your requests for information, calls, emails, or in person communications, tours, newsletter, etc.</p>
                                    </td>
                                    <td>
                                        <p>To communicate with you, confirm eligibility, and acquire your problems and suggestions.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Network activity information</p>
                                    </td>
                                    <td>
                                        <p>Your device model, browser type, operating system, region, IP address, pixel tags, cookies</p>
                                    </td>
                                    <td>
                                        <p>Optimize website and app performance, based on either your consent, our contract with you and/or our legitimate interests in improving user experience and security</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Device information</p>
                                    </td>
                                    <td>
                                        <p>Device latitude and longitude (positioning), SIM information, device type, device name, device part number, device ID, firmware version, language, etc.</p>
                                        <p style="height: 16px;"><br></p>
                                    </td>
                                    <td>
                                        <p>For map positioning function. SIM card recharge, package query, traffic query and balance query. Device status and website statistic, to provide remote product information and control management, warranty binding, APP local login, improve products and services.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Device Log</p>
                                    </td>
                                    <td>
                                        <p>Server visit time, protocol, device information(type, SN, etc.)</p>
                                    </td>
                                    <td>
                                        <p>Make sure products and services work properly. Locate faulty problem.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Currency type</p>
                                    </td>
                                    <td>
                                        <p>Currency type used locally</p>
                                    </td>
                                    <td>
                                        <p>To display the economy benefit on client software.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Time Zone</p>
                                    </td>
                                    <td>
                                        <p>Plant time zone</p>
                                    </td>
                                    <td>
                                        <p>Calculate the plant local time, get the solar irradiation to make system work properly.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>System size</p>
                                    </td>
                                    <td>
                                        <p>Plant system power size</p>
                                    </td>
                                    <td>
                                        <p>To display the plant information on client software, get users better know the plant operation status.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="font-secondary text-base leading-[24px]">If you do not want to receive these types of information, you can opt out at any time.</p>

                    <p class="font-secondary text-base leading-[24px]">Data authority(if you authorize it in OlaxCloud)</p>

                    <div class="over-tabs  overflow-x-scroll">
                        <table>
                            <tbody>
                                <tr class="firstRow">
                                    <td>
                                        <p>Data type</p>
                                    </td>
                                    <td>
                                        <p>Item</p>
                                    </td>
                                    <td>
                                        <p>Access</p>
                                    </td>
                                    <td>
                                        <p>Edit</p>
                                    </td>
                                    <td>
                                        <p>Delete</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="13">
                                        <p>End-user data</p>
                                    </td>
                                    <td>
                                        <p>Email</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Name</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Phone</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Location(longitude,latitude)</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Time zone</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Account</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Password</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>End-user</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Address</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Post code</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Currency unit</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Country</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Tariff</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>IP address</p>
                                    </td>
                                    <td>
                                        <p>Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="9">
                                        <p>Installer data</p>
                                    </td>
                                    <td>
                                        <p>Email</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Name</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Company Name</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Phone</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Country</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Address</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>IP address</p>
                                    </td>
                                    <td>
                                        <p>Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Account</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Password</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>Installer</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="9">
                                        <p>Agent data</p>
                                    </td>
                                    <td>
                                        <p>Email</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Name</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Company Name</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Country</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Address</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>IP address</p>
                                    </td>
                                    <td>
                                        <p>Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Phone</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Account</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Password</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>Agent</p>
                                    </td>
                                    <td>
                                        <p>Agent,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="10">
                                        <p>Device data</p>
                                    </td>
                                    <td>
                                        <p>Inverter SN</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Network module SN</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Consumed power</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Generated power</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Extended warranty code</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Promo code</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Battery SN</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>/</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Deployed time</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>PV manufacture</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>PV model</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Agent,Installer,Customer service</p>
                                    </td>
                                    <td>
                                        <p>End-user,Customer service</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="list-disc pl-3">
                        <li>End-use can ask installer/agent/manufacture to delete the account, all the account information, contact information and relationship between account and plant/device will be removed. This normally will be done within 3 work days.</li>
                        <li>Installer can ask agent/manufacture to delete the account, all the account information and contact information will be removed.</li>
                        <li>Agent can ask manufacture to delete the account, all the account information and contact information will be removed.</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-5">


                </div>
                <div class="flex flex-col gap-5" id="cookie-setting">
                    <span class="font-secondary text-2xl leading-[24px] font-bold">II. Cookies & Similar Technologies</span>
                    <ol class="flex flex-col gap-5">
                        <li class="font-secondary text-lg leading-[24px]">II.1 Cookies</li>
                        <ol>
                            <li class="font-secondary text-base leading-[24px]">
                                <p>To ensure our website works correctly, we may at times place a small piece of data known as a cookie on your computer or mobile device. A cookie is a text file stored by a web server on a computer or mobile device. The content of a cookie can be retrieved or read only by the server that creates the cookie. The text in a cookie often consists of identifiers, site names, and some numbers and characters. Cookies are unique to the browsers or mobile applications you use, and enable websites to store data such as your preferences or items in your shopping cart.</p>
                            </li>

                            <li class="font-secondary text-base leading-[24px]">
                                <p>Like many other websites or Internet service providers, Olax Power uses cookies to improve user experience. Session cookies are deleted after each visit, while persistent cookies remain in place across multiple visits. Cookies allow websites to remember your settings such as language, font size on your computer or mobile device, or other browser preferences. This means that a user does not need to reset preferences for every visit. On the contrary, if cookies are not used, websites will treat you as a new visitor every time you load a web page. For example, if you are redirected to another web page from a website you are already logged in to and then return to the original website, it will not recognize you and you must log in again.</p>
                            </li>
                            <li class="font-secondary text-base leading-[24px]">
                                <p>Olax Power will not use cookies for any purposes not stated in this Policy. You can manage or delete cookies based on your own preferences. For details, visit <a class="text-blue-500" href="https://www.aboutcookies.org/">AboutCookies.org</a>. You can clear all the cookies stored on your computer, and most web browsers provide the option of blocking cookies. However, by doing so, you have to change the user settings every time you visit our website. Find out how to manage cookie settings for your browser here:<br><a class="text-blue-500" href="http://support.microsoft.com/kb/260971">Internet Explorer</a><br><a class="text-blue-500" href="https://support.google.com/chrome/bin/answer.py?hl=en-GB&amp;answer=95647&amp;p=cpn_cookies">Google Chrome</a><br><a class="text-blue-500" href="http://support.mozilla.org/en-US/kb/Cookies">Mozilla Firefox</a><br><a class="text-blue-500" href="http://support.apple.com/kb/PH5042">Safari</a><br><a class="text-blue-500" href="http://www.opera.com/browser/tutorials/security/privacy">Opera</a></p>
                            </li>
                        </ol>
                        <li class="font-secondary text-lg leading-[24px]">II.2 Web Beacons and Pixel Tags</li>
                        <ol>
                            <li class="font-secondary text-base leading-[24px]">
                                <p>In addition to cookies, we may also use other similar technologies on our websites such as web beacons and pixel tags. For example, when you receive an email from Olax Power, it may contain a click-through URL that links to a Olax Power web page. If you click the link, Olax Power will track your visit to help us to analyze our products and service for improvement . No personal data will be collected. A web beacon is a transparent graphic image embedded in a website or in an email. We use pixel tags in emails to find out whether an email has been opened. You can unsubscribe from the Olax Power mailing list at any time if you do not want to be tracked in this manner.</p>
                            </li>

                            <li class="font-secondary text-base leading-[24px]">
                                <p>By using our website, you consent to the use of cookies, web beacons and pixel tags as described above.</p>
                            </li>
                        </ol>
                    </ol>
                </div>
                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">III. How We Disclose Personal Data</span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>Olax Power shares your personal data with other partners, as described in this Policy, when services are provided by partners authorized by Olax Power. For example, when you ask for installation and maintenance service, we will share your personal data with the Olax Power authorized Installers to provide services. In addition, as a global company, we may share personal data with Olax Power affiliates and subsidiaries.</p>
                        </li>

                        <li class="font-secondary text-base leading-[24px]">
                            <p>To comply with applicable laws or respond to valid legal procedures, Olax Power may also disclose your personal data to law enforcement or other government agencies. If Olax Power is involved in a restructuring, merger &amp; acquisition, or a bankruptcy or liquidation lawsuit in a given jurisdiction, your personal data may be disclosed in connection with the transaction. Olax Power may also disclose your data when appropriate, for example, to execute Terms and Conditions, when we believe disclosure is necessary or appropriate to prevent physical harm or financial loss, or when it is in connection with an investigation of suspected or actual illegal activity.</p>
                        </li>
                    </ol>

                </div>

                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">IV. How to Access & Control Your Personal Data</span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>It is your responsibility to ensure that all personal data submitted to Olax Power is correct. Olax Power is dedicated to maintaining the accuracy and completeness of personal data and keeping the data up-to-date.</p>
                        </li>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>To the extent required by applicable law, you may</p>
                            <ul class="list-disc pl-3">
                                <li>Have the right to access certain personal data we maintain about you.</li>
                                <li>Request that we update or correct inaccuracies in that data.</li>
                                <li>Object or restrict to our use of your personal data.</li>
                                <li>Ask us to delete your personal data from our database</li>
                            </ul>
                            <p>To exercise these rights, please <a class='text-blue-500' href="/usa-contact/">click here </a>to give your feedback online. Your written request may be required for security. We may decline the request if we have reasonable grounds to believe that the request is a fraudulent, unfeasible or may jeopardize the privacy of others.</p>
                        </li>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>If allowed by applicable laws, you have the right to withdraw your consent at any time when Olax Power processes your personal data based on your consent. However, withdrawal does not affect the legitimacy and effectiveness of how we process your personal data based on your consent before the withdrawal is made; nor does it affect any data processing based on another justification other than your consent.</p>
                        </li>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>If you think that the way we process your personal information does not comply with applicable data protection laws, you can contact the relevant competent data protection authority.</p>
                        </li>
                    </ol>

                </div>

                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">V. How We Protect and Retain Your Personal Data</span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>The security of your personal data is important to us. We use appropriate physical, management, and technical measures to protect your personal data from unauthorized access, disclosure, use, modification, damage, or loss. For example, we use cryptographic technologies for data confidentiality, protection mechanisms to prevent attacks, and access control mechanisms to permit only authorized access to your personal data. We also provide training on security and privacy protection for employees to raise their awareness of personal data protection. Olax Power is committed to protecting your personal data; however, please note that no security measure is perfect.</p>
                        </li>

                        <li class="font-secondary text-base leading-[24px]">
                            <p>For users in Europe, your personal data will be processed and stored in Aliyun server from Alibaba in Frankfurt, Germany. We build isolation from each international server for your data security. We will retain your personal information for no longer than is necessary for the purposes stated in this Policy, unless otherwise extending the retention period is required or permitted by law. The data storage period may vary with scenario, product, and service. The standards Olax Power uses to determine the retention period are as follows: the time required to retain personal data to fulfill business purposes, including providing products and services; maintaining corresponding transaction and business records; controlling and improving the performance and quality of products and services; ensuring the security of systems, products, and services; handling possible user queries or complaints and locating problems; whether the user agrees to a longer retention period; and whether the laws, contracts, and other equivalencies have special requirements for data retention; etc. We will maintain your registration information as long as your account is necessary for service provision. You can choose to deregister your account. After you deregister your account, we will stop providing you with products and services through your account and delete your relevant personal data, provided that deletion is not otherwise stipulated by special legal requirements.</p>
                        </li>
                    </ol>

                </div>
                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">VI. How We Process Children's Personal Data
                    </span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>Our websites, products and services are primarily intended for adults and only could be used by persons of legal age. We don't provide service to minors or collect data from minors, and we require users not provide any personal data of minors. If we accidentally collect a child's personal data, we will attempt to delete the data as soon as possible.</p>
                        </li>
                    </ol>
                </div>

                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">VII. Third-Party Providers and Their Services
                    </span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>To ensure a positive user experience, you may receive content or web links from third parties other than Olax Power and its partners (“third parties”). Olax Power does not have the right to control such third parties, but you can choose whether to use the links, view the content and/or access the products or services provided by third parties.</p>
                        </li>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>Olax Power cannot control the privacy practices and data protection policies of third parties that are not subject to this Policy. When you submit personal information to such a third party, please read and refer to the privacy protection policy of the third party.</p>
                        </li>
                    </ol>
                </div>

                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">VIII. International Transfers of Your Personal Data</span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>As a global company, your personal data collected by Olax Power may be processed or accessed in the country/region where you use our products and services or in other countries/regions where Olax Power or its affiliates, subsidiaries, service providers or business partners have a presence. These jurisdictions may have different data protection laws. In such circumstances, Olax Power will take measures to ensure that data is processed as required by this Policy and applicable laws, which includes when transferring the data subject's personal data from the EU to a country or region which have been acknowledged by the EU commission as having an adequate level of data protection, we may use a variety of legal mechanisms, such as signing standard contractual clauses approved by the EU Commission, obtaining the consent to the cross-border transfer of a data subject in the EU, or implementing security measures like anonymizing personal data before cross-border data transfer. You can <a class="text-blue-500" href="https://ec.europa.eu/info/law/law-topic/data-protection/international-dimension-data-protection/standard-contractual-clauses-scc_en">click here </a>to obtain a copy of the EU’s standard contractual clauses.</p>
                        </li>
                    </ol>
                </div>

                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">IX. Updates to This Policy
                    </span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>Olax Power reserves the right to update or change this Policy at any time. We will release the latest Privacy Policy on this page for any changes. If major changes are made to the Privacy Policy, we may notify you through different channels, for example, posting a notice on our website or sending you direct notification.</p>
                        </li>
                    </ol>
                </div>

                <div class="flex flex-col gap-5">

                    <span class="font-secondary text-2xl leading-[24px] font-bold">X. How to Contact Us
                    </span>
                    <ol>
                        <li class="font-secondary text-base leading-[24px]">
                            <p>If you have any privacy complaints or issues, and want to contact Olax Power, please <a class="text-blue-500" href="/usa-contact/">click here</a>. Normally we will respond within 15 days.</p>
                        </li>
                    </ol>
                </div>


            </div>
        </div>
    </div>
</section>


<!-- sixth section -->
@include('layout.newsletter')
@endsection
