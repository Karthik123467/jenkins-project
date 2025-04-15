pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = "php_docker_project"
    }

    stages {
        stage('Clean Workspace') {
            steps {
                deleteDir()
            }
        }

        stage('Checkout') {
            steps {
                git 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Rebuild and Deploy') {
            steps {
                sh 'docker-compose down --remove-orphans || true'
                sh 'docker-compose up -d --build --force-recreate'
            }
        }
    }

    post {
        success {
            echo 'Deployment completed successfully!'
        }
        failure {
            echo 'Something went wrong during deployment.'
        }
    }
}

