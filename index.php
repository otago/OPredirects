<?php

$host = $_SERVER['HTTP_HOST'] ?? '';
$uri  = $_SERVER['REQUEST_URI'] ?? '';

// helper
function redirect($url, $code = 302) {
    header("Location: $url", true, $code);
    exit;
}

/**
 * CRM
 */
if (preg_match('#^crm\.op\.ac\.nz$#i', $host)) {
    redirect("https://op.crm5.dynamics.com$uri");
}

if (preg_match('#^devcrm\.op\.ac\.nz$#i', $host)) {
    redirect("https://otagopolydev.crm5.dynamics.com$uri");
}

if (preg_match('#^crmuat\.op\.ac\.nz$#i', $host)) {
    redirect("https://otagopolyuat.crm5.dynamics.com$uri");
}

/**
 * Office
 */
if (preg_match('#^(office\.op\.ac\.nz|office\.student\.op\.ac\.nz)$#i', $host)) {
    redirect("https://idp.op.ac.nz/adfs/ls/?wa=wsignin1.0&wtrealm=urn:federation:MicrosoftOnline");
}

/**
 * OPDocs 
 */
if (preg_match('#^opdocs\.op\.ac\.nz$#i', $host)) {
    //redirect("https://idp.op.ac.nz/adfs/ls/?wa=wsignin1.0&wtrealm=urn:federation:MicrosoftOnline");
    
    $url = 'https://idp.op.ac.nz/adfs/ls/?wa=wsignin1.0'
        . '&wtrealm=urn:federation:MicrosoftOnline'
        . '&wctx=MEST%3D0%26LoginOptions%3D2%26wa%3Dwsignin1.0%26rpsnv%3D2%26ver%3D6.1.6206.0%26wp%3DMCMBI%26wreply%3Dhttps%253A%252F%252Fotagopoly.sharepoint.com%252Fsites%252Fopdocs%252FPages%252Fhome.aspx';

    redirect($url);
}

/**
 * Mail
 */
if (preg_match('#^(mail\.op\.ac\.nz|mail\.student\.op\.ac\.nz)$#i', $host)) {
    redirect("https://www.outlook.com/mail.op.ac.nz/");
}

/**
 * OneDrive
 */
if (preg_match('#^onedrive\.op\.ac\.nz$#i', $host)) {
    redirect("https://otagopoly-my.sharepoint.com/");
}

/**
 * Digital signage
 */
if (preg_match('#^digitalsignage\.op\.ac\.nz$#i', $host)) {

    if (preg_match('#^/manage#', $uri)) {
        redirect("http://120.138.16.172/");
    }

    redirect("http://202.20.3.21:8026");
}

/**
 * Password change
 */
if (preg_match('#^(changepassword\.op\.ac\.nz|www\.changepassword\.op\.ac\.nz)$#i', $host)) {
    redirect("https://idp.op.ac.nz/adfs/portal/updatepassword");
}

/**
 * ShowMeHow
 */
if (preg_match('#^showmehow\.op\.ac\.nz$#i', $host)) {
    redirect("https://idp.op.ac.nz/adfs/ls/?wa=wsignin1.0&wtrealm=urn:federation:MicrosoftOnline");
}

/**
 * Insite
 */
if (preg_match('#^insite\.op\.ac\.nz$#i', $host)) {
    redirect("https://www.op.ac.nz/hub");
}

/**
 * Central / Auckland
 */
if (preg_match('#^www\.central\.op\.ac\.nz$#i', $host)) {
    redirect("https://central.op.ac.nz$uri");
}

if (preg_match('#^www\.auckland\.op\.ac\.nz$#i', $host)) {
    redirect("https://auckland.op.ac.nz$uri");
}

/**
 * OAE marketing
 */
if (preg_match('#^oae\.op\.ac\.nz$#i', $host)) {
    redirect("https://www.op.ac.nz/study/physical-activity-and-wellbeing/new-zealand-certificate-in-outdoor-and-adventure-education-multi-skilled-level-4/$uri");
}

/**
 * Placements
 */
if (preg_match('#^placements\.op\.ac\.nz$#i', $host)) {
    redirect("https://op-nz.inplacesoftware.com$uri");
}

if (preg_match('#^sandbox-placements\.op\.ac\.nz$#i', $host)) {
    redirect("https://op-sandbox-signon-nz.inplacesoftware.com$uri");
}

/**
 * Wellbeing / Getting started
 */
if (preg_match('#^wellbeing-toolbox\.op\.ac\.nz$#i', $host)) {
    redirect("https://studentsupport.op.ac.nz/wellbeing-toolbox/$uri");
}

if (preg_match('#^getting-started\.op\.ac\.nz$#i', $host)) {
    redirect("https://studentsupport.op.ac.nz/getting-started/$uri");
}

/**
 * Webexpenses
 */
if (preg_match('#^webexpenses\.op\.ac\.nz$#i', $host)) {
    redirect("https://idp.op.ac.nz/adfs/ls/idpinitiatedsignon.aspx?logintoRP=webexpenses");
}

/**
 * LinkedIn Learning
 */
if (preg_match('#^(lil\.op\.ac\.nz|linkedinlearning\.op\.ac\.nz)$#i', $host)) {
    redirect("https://www.linkedin.com/checkpoint/enterprise/login/56590297?application=learning");
}

/**
 * Emergency
 */
if (preg_match('#^emergency\.op\.ac\.nz$#i', $host)) {
    redirect("https://forms.office.com/Pages/ResponsePage.aspx?id=JGgORauI0kqRTbDzhdpgDKWSgSK2tfhMjngnAve-ufZURDBOTFM0Q1A3TDNNV0dNQVlHMUQ3MVZWSy4u");
}

/**
 * Midwifery domains
 */
if (preg_match('#^(midwifery|studymidwifery|wellingtonmidwifery)\.(nz|ac\.nz|co\.nz)$#i', $host)) {
    redirect("https://www.op.ac.nz/study/health/midwifery/$uri");
}

/**
 * Teams
 */
if (preg_match('#^teams\.op\.ac\.nz$#i', $host)) {
    redirect("https://teams.microsoft.com/?domain_hint=op.ac.nz");
}

/**
 * WiFi form
 */
if (preg_match('#^wifiform\.op\.ac\.nz$#i', $host)) {
    redirect("https://forms.office.com/Pages/ResponsePage.aspx?id=JGgORauI0kqRTbDzhdpgDADdm5UPai1MuCFyZtNrdupUQVhRNThZR0RBVUlRRldMNlpQNTVETERDUSQlQCN0PWcu");
}

/**
 * Printing
 */
if (preg_match('#^mprint\.op\.ac\.nz$#i', $host)) {
    redirect("https://fthpc03.op.ac.nz:9164/setup");
}

/**
 * me@op
 */
if (preg_match('#^me\.op\.ac\.nz$#i', $host)) {
    redirect("https://ess.myobpayglobal.com/OtagoPolytechnic");
}

/**
 * Rereawhio
 */
if (preg_match('#^(rereawhio\.nz|rereawhio\.org)$#i', $host)) {
    redirect("https://auckland.op.ac.nz/aicresearch/rereawhio");
}

/**
 * Tapuae
 */
if (preg_match('#^(tapuae\.nz|www\.tapuae\.nz|tapuae\.op\.ac\.nz)$#i', $host)) {
    redirect("https://www.op.ac.nz/students/support/tapuae");
}

/**
 * Central redirect (non www)
 */
if (preg_match('#^central\.op\.ac\.nz$#i', $host)) {
    redirect("https://www.op.ac.nz/explore/campuses/central-otago-campuses/");
}

/**
 * Research
 */
if (preg_match('#^(research\.op\.ac\.nz|www\.research\.op\.ac\.nz)$#i', $host)) {
    redirect("https://online.op.ac.nz/industry-and-research/research/");
}

/**
 * Te Pa Tauira
 */
if (preg_match('#^tepatauira\.op\.ac\.nz$#i', $host)) {
    redirect("https://www.op.ac.nz/explore/find-accommodation/te-pa-tauira/");
}

/**
 * Dev mprint
 */
if (preg_match('#^dev-mprint\.op\.ac\.nz$#i', $host)) {
    redirect("https://dev-fthpc01.op.ac.nz:9164/setup");
}

/**
 * Performance portal
 */
if (preg_match('#^performanceexcellence\.op\.ac\.nz$#i', $host)) {
    redirect("https://online.op.ac.nz/hub/teams/corporate-services/information-systems-and-support/how-we-can-help/external-access-to-performance-portal");
}

?>
