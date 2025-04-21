pipeline {
    agent any

    environment {
        PROJECT_CONTAINER = 'project-copy2'
        REPO_URL = 'https://github.com/Karthik123467/php-docker-stack-demo.git' // <-- change this
        PROJECT_DIR = 'php-docker-project'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: "${REPO_URL}"
            }
        }

        stage('Copy to Container') {
            steps {
                script {
                    // Archive current workspace into a tar file
                    sh "tar -czf project.tar.gz ."
                    
                    // Copy tarball into container
                    sh "docker cp project.tar.gz ${PROJECT_CONTAINER}:/project.tar.gz"

                    // Extract inside the container
                    sh "docker exec ${PROJECT_CONTAINER} sh -c 'rm -rf /project && mkdir /project && tar -xzf /project.tar.gz -C /project'"
                }
            }
        }

        stage('Docker Compose Up') {
            steps {
                script {
                    sh "docker exec ${PROJECT_CONTAINER} sh -c 'cd /project && docker-compose up -d'"
                }
            }
        }

        stage('Run Tests or Wait') {
            steps {
                echo 'Running application or test logic...'
                sleep 10 // Optional: wait for services to be ready
            }
        }

        stage('Docker Compose Down') {
            steps {
                script {
                    sh "docker exec ${PROJECT_CONTAINER} sh -c 'cd /project && docker-compose down'"
                }
            }
        }
    }

    post {
        always {
            echo 'Pipeline execution finished.'
        }
    }
}
