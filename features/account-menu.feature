@api
Feature: Test account menu links

  Scenario: Make sure that logged in users see the account menu
    Given I am logged in as a user with the "authenticated" role
    And I am on "/"
    Then I should see the link "My account" in the "region_top_menu" region
    And I should see the link "Log out" in the "region_top_menu" region

  Scenario: Make sure that anonymous users see the account menu
    Given I am not logged in
    And I am on "/"
    Then I should see the link "Log in" in the "region_top_menu" region
