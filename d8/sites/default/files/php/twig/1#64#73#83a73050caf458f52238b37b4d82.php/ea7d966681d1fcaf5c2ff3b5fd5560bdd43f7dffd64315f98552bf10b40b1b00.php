<?php

/* core/themes/bartik/templates/maintenance-page.html.twig */
class __TwigTemplate_647383a73050caf458f52238b37b4d82 extends Drupal\Core\Template\TwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 13
        echo "<!DOCTYPE html>
<html";
        // line 14
        echo twig_render_var($this->getContextReference($context, "html_attributes"));
        echo ">
<head>
  ";
        // line 16
        echo twig_render_var($this->getContextReference($context, "head"));
        echo "
  <title>";
        // line 17
        echo twig_render_var($this->getContextReference($context, "head_title"));
        echo "</title>
  ";
        // line 18
        echo twig_render_var($this->getContextReference($context, "styles"));
        echo "
  ";
        // line 19
        echo twig_render_var($this->getContextReference($context, "scripts"));
        echo "
</head>
<body class=\"";
        // line 21
        echo twig_render_var($this->getAttribute($this->getContextReference($context, "attributes"), "class"));
        echo "\"";
        echo twig_render_var($this->getContextReference($context, "attributes"));
        echo ">

  <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
    ";
        // line 24
        echo twig_render_var(t("Skip to main content"));
        echo "
  </a>

  <div id=\"page-wrapper\"><div id=\"page\">

    <header id=\"header\" role=\"banner\"><div class=\"section clearfix\">
      ";
        // line 30
        if (((isset($context["site_name"]) ? $context["site_name"] : null) || (isset($context["site_slogan"]) ? $context["site_slogan"] : null))) {
            // line 31
            echo "        <div id=\"name-and-slogan\"";
            echo twig_render_var(((($this->getContextReference($context, "hide_site_name") && $this->getContextReference($context, "hide_site_slogan"))) ? (" class=\"visually-hidden\"") : ("")));
            echo ">
          ";
            // line 32
            if ((isset($context["site_name"]) ? $context["site_name"] : null)) {
                // line 33
                echo "            <div id=\"site-name\"";
                echo twig_render_var((($this->getContextReference($context, "hide_site_name")) ? (" class=\"visually-hidden\"") : ("")));
                echo ">
              <strong>
                <a href=\"";
                // line 35
                echo twig_render_var($this->getContextReference($context, "front_page"));
                echo "\" title=\"";
                echo twig_render_var(t("Home"));
                echo "\" rel=\"home\"><span>";
                echo twig_render_var($this->getContextReference($context, "site_name"));
                echo "</span></a>
              </strong>
            </div>
          ";
            }
            // line 39
            echo "          ";
            if ((isset($context["site_slogan"]) ? $context["site_slogan"] : null)) {
                // line 40
                echo "            <div id=\"site-slogan\"";
                echo twig_render_var((($this->getContextReference($context, "hide_site_slogan")) ? (" class=\"visually-hidden\"") : ("")));
                echo ">
              ";
                // line 41
                echo twig_render_var($this->getContextReference($context, "site_slogan"));
                echo "
            </div>
          ";
            }
            // line 44
            echo "        </div> <!-- /#name-and-slogan -->
      ";
        }
        // line 46
        echo "    </div></header> <!-- /.section, /#header -->

    <div id=\"main-wrapper\"><div id=\"main\" class=\"clearfix\">
      <main id=\"content\" class=\"column\" role=\"main\"><section class=\"section\">
        <a id=\"main-content\"></a>
        ";
        // line 51
        if ((isset($context["title"]) ? $context["title"] : null)) {
            echo "<h1 class=\"title\" id=\"page-title\">";
            echo twig_render_var($this->getContextReference($context, "title"));
            echo "</h1>";
        }
        // line 52
        echo "        ";
        echo twig_render_var($this->getContextReference($context, "content"));
        echo "
        ";
        // line 53
        if ((isset($context["messages"]) ? $context["messages"] : null)) {
            // line 54
            echo "          <div id=\"messages\"><div class=\"section clearfix\">
            ";
            // line 55
            echo twig_render_var($this->getContextReference($context, "messages"));
            echo "
          </div></div> <!-- /.section, /#messages -->
        ";
        }
        // line 58
        echo "      </section></main> <!-- /.section, /#content -->
    </div></div> <!-- /#main, /#main-wrapper -->

  </div></div> <!-- /#page, /#page-wrapper -->

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "core/themes/bartik/templates/maintenance-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 58,  128 => 55,  125 => 54,  123 => 53,  118 => 52,  112 => 51,  105 => 46,  101 => 44,  95 => 41,  90 => 40,  87 => 39,  76 => 35,  70 => 33,  68 => 32,  63 => 31,  61 => 30,  52 => 24,  44 => 21,  35 => 18,  31 => 17,  27 => 16,  22 => 14,  65 => 37,  59 => 35,  55 => 33,  46 => 31,  42 => 30,  39 => 19,  36 => 28,  30 => 26,  28 => 25,  23 => 24,  19 => 13,);
    }
}
