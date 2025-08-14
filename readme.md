Project Brief: Development Plan for the IHTC Web Application on WordPress
Objective: To develop a modern, mobile-first web application on the WordPress platform, replicating the functionality and content of the existing IHTC web app. This plan ensures a scalable architecture, a straightforward content management experience, and a clear path for data migration.

Core Technology Stack:

CMS: WordPress
Theme: Astra (for its performance and flexibility)
Page Builder: Elementor Pro (for visual design and templating)
Custom Content: A dedicated custom plugin and the Advanced Custom Fields (ACF) Pro plugin.
Development Strategy: A Phased Approach
Our development process is broken down into three key phases: Foundation, Content & Data, and UI/UX Development.

Phase 1: Building the Foundation (The "How")
This phase is about creating a robust and scalable backend structure.

Custom Plugin for Core Functionality:

We will develop a small, dedicated plugin named ihtc-custom-content.
Purpose: This plugin will define our application's unique content structures, keeping them separate from the theme. This is a best practice that prevents theme-lock-in and makes future updates much safer.
Implementation: The plugin will register two primary Custom Post Types (CPTs):
Guidelines: A hierarchical post type for our main navigation and content sections (e.g., "Introduction," "Pharmacology"). This allows us to create nested, ordered content.
Products: A non-hierarchical post type for our detailed data objects like factor cards and drugs (e.g., "Alphanate," "Warfarin").
Custom Taxonomy for Relationships:

The plugin will also register a Custom Taxonomy called Product Categories.
Purpose: This is the "glue" that connects our Products to our Guidelines. For example, the "Alphanate" product will be assigned to the "FVIII" product category, which itself might be a child of the "Factor Cards" guideline. This creates the logical relationships needed for navigation.
Phase 2: Content & Data Structure (The "What")
This phase focuses on defining and migrating the application's data.

Defining Data Fields with Advanced Custom Fields (ACF):

We will use ACF to create all the specific data fields for our Products.
Examples: Mechanism of Action, Half-Life, Dosing Calculation, FDA Approval Date, Product Image, etc.
Benefit: This gives our content managers simple, structured forms in the WordPress admin, ensuring data consistency and ease of use.
Data Migration Plan:

API-First Approach: The custom post types will be configured to be available via the WordPress REST API.
Migration Path: We will export the data from the old application (ideally as JSON). A migration script will then be used to read this data and programmatically create the corresponding Guidelines and Products in the new WordPress site via the REST API. This automates the process and minimizes manual error.
Phase 3: UI/UX Development (The "Look and Feel")
This phase is about building the mobile-first user interface.

Theme and Page Builder Setup:

We will use the lightweight Astra theme as a clean base.
Elementor Pro will be our primary tool for building the front-end.
Dynamic Templating:

We will create two main templates in Elementor:
A "Single Guideline" Template: This will define the layout for our hierarchical content pages. It will be designed to dynamically list its child pages or associated products.
A "Single Product" Template: This will be the detailed view for our drugs and factor cards. We will design this template once, and it will automatically apply to all Product posts.
Dynamic Data: All the data from our ACF fields will be pulled into the templates dynamically using Elementor's built-in ACF integration. This means if a content manager updates a dosing calculation in the admin, it automatically updates on the live site without any code changes.
Mobile-First Design:

Throughout the UI development process, we will use Elementor's responsive design tools to ensure the application is optimized for mobile, tablet, and desktop views.