pipeline {
    agent any

    environment {
        IMAGE_PHP = "php:apache"
        IMAGE_DB = "mysql:latest"
        IMAGE_PHPMYADMIN = "phpmyadmin/phpmyadmin"
        CONTAINER_WEB = "php-web"
        CONTAINER_DB = "php-db"
        CONTAINER_PM = "phpmyadmin"
    }

    stages {
        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Stop and Remove Old Containers') {
            steps {
                script {
                    bat """
                    docker-compose down || echo "No containers running"
                    """
                }
            }
        }

        stage('Build and Run Containers') {
            steps {
                script {
                    bat "docker-compose up -d --build"
                }
            }
        }
    }

    post {
        failure {
            echo '❌ Build or deployment failed!'
        }
        success {
            echo '✅ PHP App deployed successfully with Docker Compose.'
        }
    }
}

