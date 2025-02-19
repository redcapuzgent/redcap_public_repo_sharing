# Public Repo Sharing
> [!CAUTION]
> This module has been deprecated since the introduction of the redesigned File Repository in REDCap 13.1.0.

## Purpose
This module allows users to publicly share documents or images from the File Repository.

## How to use the module
### Setup in REDCap
1. Enable the module for your project.
2. Configure a secret salt as a project setting. Keep this salt secret.Set the project specific salt
   ![Set the project specific salt](https://github.com/redcapuzgent/redcap_public_repo_sharing/blob/master/setupSalt.png)
3. In the File Repository you should now have an extra link icon.
   ![Extra link in the File Repository](https://github.com/redcapuzgent/redcap_public_repo_sharing/blob/master/filerepo.png)
4. Clicking on the link icon will show you a page with an associated link.
   ![Public link to the asset](https://github.com/redcapuzgent/redcap_public_repo_sharing/blob/master/publiclink.png)
5. Using the link:  
   You can use the generated link in dynamic fields, for example: `<img src="Your_URL_here">`

### Frequently asked questions
- **Can I disable the URLs after sending them out?**
  Yes, but this will impact all shared URLs. The available options are:
  - Disable the module entirely.
  - Change the salt project setting.
> [!WARNING]
> This will disable ALL existing links.
