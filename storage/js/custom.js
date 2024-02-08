
function FileSelected(file){
  /**
   * file is an object containing following properties:
   * 
   * fullPath - path to the file - absolute from your site root
   * path - directory in which the file is located - absolute from your site root
   * size - size of the file in bytes
   * time - timestamo of last modification
   * name - file name
   * ext - file extension
   * width - if the file is image, this will be the width of the original image, 0 otherwise
   * height - if the file is image, this will be the height of the original image, 0 otherwise
   * 
   */
  alert('"' + file.fullPath + "\" selected.\n To integrate with CKEditor or TinyMCE change INTEGRATION setting in conf.json. For more details see the Installation instructions at http://www.roxyfileman.com/install.");
}
function GetSelectedValue(){
  /**
  * This function is called to retrieve selected value when custom integration is used.
  * Url parameter selected will override this value.
  */
  
  return "";
}
