@extends('layout.default')

@section('content')
<div class="page-head servers">
    <div class="container">
        <div class="col-xs-12 col-sm-6">
            <h4 class="page-head-title">Terms of Service</h4>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('default.home') }}">Home</a>
                    </li>
                    <li>
                        <span>Terms of Service</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="section-title">Terms of <span>Service</span></h3>
                <p>The table of contents to the right can be used to quickly jump to different sections of this Terms of Service and Condition of Services agreement. Please be sure to read and understand all aspects of this Terms of Service agreement before creating an account or purchasing any services offered by Falcon Frag Networks, as all customers must agree and abide by everything stated in this page.</p>
            </div>
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('default.legal.tos').e('#introduction') }}">Introduction</a></li>
                    <li><a href="{{ route('default.legal.tos').e('#finance') }}">Registration &amp; Finances</a></li>
                    <li><a href="{{ route('default.legal.tos').e('#support') }}">Customer Support &amp; Security</a></li>
                    <li><a href="{{ route('default.legal.tos').e('#uptime') }}">Uptime &amp; Downtime</a></li>
                    <li><a href="{{ route('default.legal.tos').e('#abuse') }}">Abuse of Services</a></li>
                    <li><a href="{{ route('default.legal.tos').e('#closing') }}">Closing</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="bg-alt" id="introduction" name="introduction">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Introduction</h3>
                <p>The following documentation of legally binding agreements and regulations is solely connected between Falcon Frag Networks, LLC ("Falcon Frag") of <a href="{{ url('/') }}">falconfrag.com</a> and the person(s) or organization/company using Falcon Frag Networks' website and/or hosting service(s). All customers will be held strongly in accordance to all statements herin, and will be accountable for upholding all conditions in regards to Falcon Frag Networks.</p>
                <p>Any issues, arguments or other matters which have not been specifically detailed or mentioned within these terms reside under the jurisdiction of Falcon Frag Networks to decide an appropriate method of action(s) as an appropriate response. Any decision made relating to issues underneath Falcon Frag Networks' influence must be upheld by the customer(s) involved.</p>
                <p>Falcon Frag Networks reserves the right to evaluate each and every customer with a unique outlook. We are willing to work closely with any customer to inform what is/is not acceptable. All possible reprocussions for a specific action are liable to change depending on information related to the customer, primarily based on, but not limited to, previous offenses.</p>
            </div>
        </div>
    </div>
</section>
<section id="finance" name="finance">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Registration &amp; Finances</h3>
                <p>Falcon Frag Networks agrees to provide the advertised service(s) for the price(s) offered at the time purchased. All prices on Falcon Frag Networks' services are subject to change regularly. Notice will be provided in advance to affected customers in the event of price changes, whether or not the new cost is higher or lower than previous. All services provided by Falcon Frag Networks fall into restrictions of this agreement.</p>
                <p>All customers with Falcon Frag Networks must relinquish entirely true information. Customers must be at least 13 years old and have parental authorization before making any purchases if under 18 years old. Information that customers must accurately provide include, but are not limited to, their physical address, phone number and name for best contact. The primary contact will be the owner of the account unless a special notification is received following the customer's purchase(s). If any information is later found to be incorrect or falsified, Falcon Frag Networks has the authority to instantly terminate the customer's account and provided services without reimbursement.</p>
                <p>Falcon Frag Networks reserves the right to conduct simplistic background checks after purchasing and initiating services to ensure all provided information is correct, and that the customer applying does not have history of illegal, corrupt or otherwise shady actions against or under previous hosting companies. Such actions against or under previous companies can include, but are not limited to, previous accounts of avoiding payments or dues for services, previous accounts of falsified information, abouse of services or illegal activities.</p>
                <p>Falcon Frag Networks reserves the right to refuse any service(s) to any person(s) or organization(s). All customers promise to use services provided by Falcon Frag Networks for lawful purposes. Falcon Frag Networks reserves the right and discretion to cooperate with any legal authority in an investigation of suspected crime or wrongdoing. If anything is found to be illegal in accordance with the United States or any specific state legislation involved, Falcon Frag Networks will follow all legal procedures required and proceed to terminate the customer's account and services. The customer involved may also be no longer permitted to continue business with Falcon Frag Networks. Any and all of the customer's personal informaion may be disclosed upon a formal written request of a law enforcement agency.</p>
                <p>All payments for monthly, quarterly, semi-annually, and annual services must be made within 24 hours after Falcon Frag Networks has sent the invoice. Failure to re-new the service(s) will result in a suspension lasting up to 10 days until the invoice is paid, or Falcon Frag Networks terminates the service entirely and may delete the customer's files as customary of the company's termination of services. Falcon Frag Networks can be contacted in special or unique cases involving problems with the payment process or other issues, however Falcon Frag Networks has the final verdict on any and all special payment cases. Customers must accept the final decision made by Falcon Frag Networks. Invoices for dedicated servers must be paid within seven days prior to the start of the next service period, whether the service is billed monthly, quarterly, semi-annually, or annually. Failure to do so will result in immediate account suspension. The invoice must be paid before the end of the term or the service will be entirelly terminated.</p>
                <p>All funds that are added to customer accounts through Group Pay will only be allowed for use with Falcon Frag Networks products and services. No payouts are available or offered for the funds and remain as account credit until spent. If a customer has funds located in their Group Pay, however have their account terminated through actions labeled as unethical or illegal by Falcon Frag Networks, the funds can no longer be used or accessed by the customer.</p>
                <p>Customers have exactly three days following the purchase of regular services from Falcon Frag Networks to recieve a full refund. Any termination or cancellation of the account or services outside of the three day refund period will be understood by the customer as unrefundable. Dedicated Servers, domains, dedicated IP addresses, or Managed Solutions are not classified under regular services, and have no refund period following purchase. All refund requests must be submitted via ticket to Falcon Frag Networks' billing department.</p>
                <p>Any payment disputes or issues dealing with the customer's payment method can create up to a 50 dollar account reactivation fee depending on prior problems or issues the customer has had with Falcon Frag Networks' payment policies. Customers are highly encouraged to contact Falcon Frag Networks' billing department before taking any actions regarding payment method issues.</p>
                <p>Creating a dedicated server, due to the manual setup required, usually takes between 24-48 hours to complete and activate, however may take longer in instances of unusual circumstances. The billing cycle begins when the server is provisioned, not once payment is received. If unusual or unforeseen issues cause the dedicated server to take longer than normal to start, Falcon Frag Networks may provide compensation depending on the scenario, however compensation for such circumstances is entirely at the discretion of Falcon Frag Networks.</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-alt" id="support" name="support">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Customer Support &amp; Security</h3>
                <p>Any information directly related to the customer, including, but not limited to, financial information, contact information, information stored in support tickets, live chat logs, or emails, will not be disclosed to the public or to any other companies or organizations, unless required by law. All customers are aware that Falcon Frag Networks may, without notice to the customer(s) involved, report any suspected illegal conduct to the appropriate authorities or provide any information about the customer(s) involved or end users in response to a formal request from a law enforcement or regulator agency.</p>
                <p>Falcon Frag Networks will send relatively limited e-mail contact to customers. E-mails will only be sent relating to original account information (after initially purchasing services from Falcon Frag Networks), changes with account information, payment reminders (if an upcoming service deadline had not yet been accounted for with Falcon Frag Networks), occasional advertisements for new Falcon Frag Networks products following the discontinuation of services, and important changes within Falcon Frag Networks' policies, products, or various other aspects within the company, including the monthly newsletter. All customers understand and agree to receive all e-mails from Falcon Frag Networks from the initial point of purchasing services. Customers have the option to opt out of these emails from their account settings page.</p>
                <p>Falcon Frag Networks reserves the right to cache the entirety of all customer's websites for the interest of Falcon Frag Networks' company security. Falcon Frag Networks agrees that all cache will be in accordance with the copyright provisions of this agreement. </p>
                <p>Falcon Frag Networks will maintain control and ownership of all dedicated IP addresses that may be assigned to customers. Customers who purchase a dedicated IP address are only leasing the address from Falcon Frag Networks. Falcon Frag Networks reserves the right to change the dedicated IP address upon a 24-hour notice to the customer prior to modification.</p>
                <p>Customers are solely responsible for the creation and operation of their online stores and products. This includes, but is not limited to, the accuracy and relevance of content appearing within the store related to the customer's products, ensuring the customer's products are related to your store and are not illegal in nature, noting the charge and enforcement of any and all shipping and sales taxes and costs, all responsibility for accepting, processing, and filling any orders, ensuring that everything abides by all laws, FTC regulations, and provisions of Falcon Frag Networks' terms and conditions. Falcon Frag Networks will not be responsible for any security breaches in the customer's software system, or security or private information that the customer purposefully or accidently releases.</p>
                <p>All customers should maintain a current copy of all content hosted with Falcon Frag Networks. Falcon Frag Networks will not provide any file backups without payment for such services, and will not be held responsible for lost information that was not backed up by the customer. Upon cancellation or termination of an account or service, all affiliated files will be permanently deleted.</p>
                <p>Customers are solely responsible for safeguarding their account ID and password, as well as other account information. Falcon Frag Networks will not be held accountable if an account if compromised as a result of the customer's negligence to safeguard their credentials.</p>
            </div>
        </div>
    </div>
</section>
<section id="uptime" name="uptime">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Uptime &amp; Downtime</h3>
                <p>Falcon Frag Networks does not state any claims or hold any guarantees that any services provided will be 100% error free, unconditionally uninterrupted, or perfectly secure. Any customer that is in good standing with Falcon Frag Networks in regards to finances and policies however will recieve a 100% uptime guarantee which can possibly give compensation in regards to unscheduled downtime.</p>
                <p>Unscheduled network downtimes will be monitored by Falcon Frag Networks' staff and will be posted on the network status page. If a customer is attempting to use services with Falcon Frag Networks during an unscheduled downtime, a support ticket should be submitted by the customer as soon as possible to alert staff of the issue. If support tickets are unavailable, e-mails can be sent to support@falconfrag.com. Falcon Frag Networks will begin tracking downtime ten minutes after the first message from a customer. For every hour of unscheduled downtime, Falcon Frag Networkds will offer a five percent stackable discount on the customer's next invoice for a maximum of 20 percent as long as the customer's account is in good standing.</p>
                <p>Falcon Frag Networks will post all scheduled downtimes in the network status page. Scheduled downtimes will not count towards the five percent network downtime discount. All customers should regularly check the page to be knowledable about any possible scheduled downtime in order to plan around them. Additionally, Falcon Frag Networks will make a strong effort to schedule all required downtime during time periods containing the least amount of traffic.</p>
                <p>If a customer encounters unscheduled downtime but fails to notify Falcon Frag Networks about the incident, no record of the event will exist, which will result in no possible compensation for the customer based on the event. Customers should not contact Falcon Frag Networks about old, undocumented downtime.</p>
                <p>If occurances outside of a customer's control prevent them from accessing Falcon Frag Networks' service(s), such as acts of nature, power grid failure, or national issues, the customer will still be required to pay for the product(s) or service(s) on time. The customer must contact Falcon Frag Networks in order to temporarily pause the service in order to no longer be charged for its use.</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-alt" id="abuse" name="abuse">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Abuse of Services</h3>
                <p>Falcon Frag Networks holds all rights for instant termination of service(s) from any customer.</p>
                <p>Customers are responsible for monitoring disk space and bandwidth usage. Falcon Frag Networks will assess the situation and act as the sole judge in situations where the customer becomes in violation with this provision. Customers will be notified and given 48 hours to solve the problem at hand or contact Falcon Frag Networks support services to remedy he problem. Failure to do so will result in possible account suspension and/or termination of services. All game servers will be limited to 5 Gigabytes (GB) of disk space and 50 Gigabytes (GB) of Bandwidth unless special arrangements are made through Falcon Frag Networks' support department. Web hosting clients are not allowed to exceed 50 Gigabytes (GB) of disk space and 500 Gigabytes (GB) of bandwidth. Doing so will result in immediate service suspension, and a minimum of a 15 dollar fine which must be paid before the service will be reinstated.</p>
                <p>Any attempt to undermine or cause harm to a server provided by Falcon Frag Networks is strictly prohibited. Falcon Frag networks will swiftly act on any attempted use of a server without the customer's permission. This is included but not limited to scamming, password theft, security hole scanning, etc. Any unauthorized use of accounts by violating party, whether or not the attacked account belongs to Falcon Frag Networks, will result in action against the violating party. Possible acions include warnings, account suspension, termination, or legal depending on the severity of the attack. Unacceptable uses also include, but are not limited to, bulk emailing, unsolicited emailing, newsgroup spamming, upload scripts, pornographic content, illegal content, DDoSing, crawling, copyright infringement, trademark infringement, warez sites, cracks, software serial numbers, proxyrelaying, link farming (the act of or by use of scripts), link grinding, linkonly sites, spamdexing, and/or anything else determined by Falcon Frag Networks to be unacceptable use of services including abuse of server resources.</p>
                <p>Falcon Frag Networks reserves the right to assess and evaluate all server uses individually to determine validity. Any other reasons not found in this agreement, but is still considered to be server abuse, will be dealt with by the customer.</p>
                <p>All files stored on Falcon Frag Networks' servers must be legally owned and have a license and/or copyright if need be. This includes, but is not limited to, MP3s, AVIs, MIDs, MPGs, MOVs, EXEs, ISOs, and JARs. Any files found infringing upon this agreement may be subject for deletion. If a customer has been found repeatedly uploading, or has uploaded in excess, illegal files such as the ones noted, account suspension and/or termination of services may be necessary. Any client who rents a dedicated server with Falcon Frag Networks is solely responsible for their content. Falcon Frag Networks will not be held liable or accountable for any illegal content.</p>
                <p>Any advertising that directly challenges Falcon Frag Networks' business platform, services, or professional standing will not be tolerated.</p>
            </div>
        </div>
    </div>
</section>
<section id="closing" name="closing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Closing</h3>
                <p>Customers agree to indemnify and hold innocent Falcon Frag Networks, and its' entire affiliated staff, from and against any claims, demands, liabilities, interest, expenses, and disbursements of any kind. Any suit brought by a third party under any theory of legal liability arising out of or related to the actual alleged use of customer's service(s) in violation of applicable law or the Terms of Service Agreement by the customer or any person using the customer's account information, regardless if the person has recieved the primary owner's authorization.</p>
                <p>Falcon Frag Networks shall not be obligated to abide to this agreement in the event of international incident, power grid failure, internet corruption, industry strife, or any acts of nature. These events are seen as being outside the realm of Falcon Frag Networks' control and likewise will not be held liable for unusual industry circumstances.</p>
                <p>Falcon Frag Networks and customers shall not be liable for the others' lost profits or any indirect, consequential or punitive loss or damage of any kind. Damages that could have been avoided by the use of reasonable diligence, arising in connection to this agreement, have been made aware of the possibility of damages.</p>
                <p>All provisions of this agreement stated above may be changed, added, or deleted with or without customer notification or permission.</p>
                <p class="text-right text-muted">Last updated 07/26/2016 at 10:37 PM CST</p>
            </div>
        </div>
    </div>
</section>
@stop
